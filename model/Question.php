<?php

class Question
{
    private $id;
    private $question;
    private $anecdote;
    private $wiki;
    private $status;
    private $created_at;
    private $updated_at;
    private $level;
    private $answer;
    private $quiz;

    public function __construct($id, $question, $anecdote, $wiki, $status, $created_at, $updated_at, $level, $answer, $quiz)
    {
        $this->id = $id;
        $this->question = $question;
        $this->anecdote = $anecdote;
        $this->wiki = $wiki;
        $this->status = $status;
        $this->created_at = $created_at;
        $this->updated_at = $updated_at;
        $this->level = $level;
        $this->answer = $answer;
        $this->quiz = $quiz;
    }



    /**
     * Get the value of id
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     */
    public function setId($id): self
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of question
     */
    public function getQuestion()
    {
        return $this->question;
    }

    /**
     * Set the value of question
     */
    public function setQuestion($question): self
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get the value of anecdote
     */
    public function getAnecdote()
    {
        return $this->anecdote;
    }

    /**
     * Set the value of anecdote
     */
    public function setAnecdote($anecdote): self
    {
        $this->anecdote = $anecdote;

        return $this;
    }

    /**
     * Get the value of wiki
     */
    public function getWiki()
    {
        return $this->wiki;
    }

    /**
     * Set the value of wiki
     */
    public function setWiki($wiki): self
    {
        $this->wiki = $wiki;

        return $this;
    }

    /**
     * Get the value of status
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * Set the value of status
     */
    public function setStatus($status): self
    {
        $this->status = $status;

        return $this;
    }

    /**
     * Get the value of created_at
     */
    public function getCreatedAt()
    {
        return $this->created_at;
    }

    /**
     * Set the value of created_at
     */
    public function setCreatedAt($created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }

    /**
     * Get the value of updated_at
     */
    public function getUpdatedAt()
    {
        return $this->updated_at;
    }

    /**
     * Set the value of updated_at
     */
    public function setUpdatedAt($updated_at): self
    {
        $this->updated_at = $updated_at;

        return $this;
    }

    /**
     * Get the value of level
     */
    public function getLevel()
    {
        return $this->level;
    }

    /**
     * Set the value of level
     */
    public function setLevel($level): self
    {
        $this->level = $level;

        return $this;
    }

    /**
     * Get the value of answer
     */
    public function getAnswer()
    {
        return $this->answer;
    }

    /**
     * Set the value of answer
     */
    public function setAnswer($answer): self
    {
        $this->answer = $answer;

        return $this;
    }

    /**
     * Get the value of quiz
     */
    public function getQuiz()
    {
        return $this->quiz;
    }

    /**
     * Set the value of quiz
     */
    public function setQuiz($quiz): self
    {
        $this->quiz = $quiz;

        return $this;
    }
}