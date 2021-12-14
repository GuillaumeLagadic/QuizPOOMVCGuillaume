<?php

class TagController extends MainController
{
    public function index()
    {
        $DBCon = new DBData();
        
        $tagList = $DBCon->getAllTags();        
        
        return $this->show('bodyTags', [
            'tags' => $tagList
        ]);
    }

}