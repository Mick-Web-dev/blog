<?php
class PostManager extends Connect
{
    public function getPosts()
    {
        $this->getBdd();
        return $this->getAll('post', 'post');
    }
}