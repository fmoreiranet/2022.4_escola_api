<?php

class Aluno
{
    public $matricula;
    public $nome;
    public $email;
    public $senha;
    public $data_nasc;

    function valid()
    {
        if ($this->nome == "" || $this->nome == null) {
            throw new Exception("Nome em branco!");
        }
        if ($this->email == "" || $this->email == null) {
            throw new Exception("E-mail em branco!");
        }
        if ($this->senha == "" || $this->senha == null) {
            throw new Exception("Senha em branco!");
        }
    }

    function mount(Object $dados)
    {
        $this->matricula = $dados->matricula;
        $this->nome = $dados->nome;
        $this->email = $dados->email;
        $this->senha = $dados->senha;
        $this->data_nasc = $dados->data_nasc;
    }
}
