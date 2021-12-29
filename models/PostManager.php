<?php
class PostManager extends Connect
{
    /**
     * @return array
     */
    public function getPosts()
    {
        $this->getBdd();
        return $this->getAll('post', 'post');
    }
}