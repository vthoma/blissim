<?php

namespace App\Support;

class Validator
{
    private $data;
    private $errors;

    public function __construct(array $data)
    {
        $this->data = $data;
    }

    public function validate(array $rules): ?array
    {
        foreach ($rules as $name => $rulesArray) {
            if (array_key_exists($name, $this->data)) {
                foreach ($rulesArray as $rule) {
                    switch ($rule) {
                        case 'required':
                            $this->required($name, $this->data[$name]);
                            break;
                        case substr($rule, 0, 3) === 'min':
                            $this->min($name, $this->data[$name], $rule);
                            break;
                        case substr($rule, 0, 3) === 'max':
                            $this->max($name, $this->data[$name], $rule);
                            break;
                        case 'string':
                            $this->string($name, $this->data[$name]);
                            break;
                    }
                }
            }
        }

        return $this->errors();
    }

    private function required(string $name, string $value)
    {
        $value = trim($value);

        if (!isset($value) || is_null($value) || empty($value)) {
            $this->errors[$name][] = "Le champ {$name} est requis.";
        }
    }

    private function string(string $name, string $value)
    {
        if(!preg_match('/^[a-z]\w{2,23}[^_]$/i', $value)) {
            $this->errors[$name][] = "Le champ {$name} doit être une chaîne de caractères.";
        }
    }

    private function min(string $name, string $value, string $rule)
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = (int) $matches[0][0];

        if (strlen($value) < $limit) {
            $this->errors[$name][] = "Le champ {$name} doit comprendre un minimum de {$limit} caractères";
        }
    }

    private function max(string $name, string $value, string $rule)
    {
        preg_match_all('/(\d+)/', $rule, $matches);
        $limit = (int) $matches[0][0];

        if (strlen($value) > $limit) {
            $this->errors[$name][] = "Le champ {$name} doit comprendre un maximum de {$limit} caractères";
        }
    }

    public function errors(): ?array
    {
        return $this->errors;
    }
}