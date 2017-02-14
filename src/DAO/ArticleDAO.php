<?php

namespace MicroCMS\DAO;

use Doctrine\DBAL\Connection;
use MicroCMS\Domaine\Article;

class ArticleDAO
{
    /**
    * Database connection
    *
    *@var \Doctrine\DBAL\Connection
    */
    private $db;

    /**
    * Constructor
    *
    *@param Doctrine\DBAL\Connection The database connection object
    */
    public function __construct(Connection $db) {
        $this->db = $db;
    }

    /**
    * Return a list of all articles, sorted by date (most recent first).
    *
    *@return array a list of articles
    */
    public function findAll() {
        $sql    = "SELECT * FROM t_article ORDER BY art_id DESC";
        $result = $this->db->fetchAll($sql);

        // Convert query result to an array of domaine object 
        $articles = array();
        foreach ($result as $row) {
            $articleId = $row['art_id'];
            $articles['$articleId'] = $this->buildArticle($row);
        }
        return $articles;
    }
    
    /**
     * Creates an Article object based on a DB row.
     *
     * @param array $row The DB row containing Article data.
     * @return \MicroCMS\Domain\Article
     */
    private function buildArticle(array $row) {
        $article = new Article();
        $article->setId($row['art_id']);
        $article->setTitle($row['art_title']);
        $article->setContent($row['art_content']);
        return $article;
    }
}