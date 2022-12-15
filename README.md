
# System Byte

Projeto desenvolvido para ser um sistema gerenciador de estoque de peças para 
veículos de grande porte dentro da disciplina de Projeto de Desenvolvimento de Software.

Para ver o tutorial de instalação clique nesse link
[Vídeo Explicativo](https://drive.google.com/file/d/1pKRT1EHyausRiRzW-asc-XyaP7HxM0Za/view?usp=sharing)
## Instalações Necessárias para o Sistema

Baixe o NodeJS: https://nodejs.org/en/download/

Baixe o Composer: https://getcomposer.org/download/

1° passo: Instalar as dependências de desenvolvimento do Composer


```bash
  composer update
```

2° passo: Instalar as dependências do NodeJS:

```bash
  npm install
```

3° passo: Compile os assets para a versão final usando o código:

```bash
  npm run dev
```
## Criação de Banco de Dados

Antes de tudo devemos criar o banco de dados para o funcionamento
correto da aplicação.

1° passo: Renomeie o arquivo ``` .env.example ``` localizado na
raiz do projeto para ``` .env ```

2° passo: Abra o PHP My Admin, copie o nome do banco de dados criado e coloque no arquivo .env

3° passo: Abra o arquivo ``` .env ``` dentro dele na linha 14 e altere com
o nome que você utiliza para o banco de dados

```bash
  DB_DATABASE = Laravel
```

4° passo: Coloque o seguinte comando no terminal para gerar a chave 
única do projeto, esta chave é necessária para o funcionamento do projeto.

```bash
  php artisan key:generate
```

## Criação do Usuário

O primeiro passo para utilização do sistema é criar um usuário
admin para acessar todas as funcionalidades do sistema.

1° passo: Crie um usuário a partir deste comando:

```bash
  php artisan migrate --seed
```
Fazendo isso irá criar o usuario com nome "admin" e email 
"admin@gmail.com" com a senha "12345678".



## Rodando o Sistema

1° passo: Para rodar o sistema em ambiente local digite o comando
abaixo:

```bash
  php artisan serve
```
Lembre-se de ativar o xampp (Banco de Dados) e certifica-se que
o banco de dados esteja criado.

O nome do banco de dados está no arquivo .env dentro da raiz do
projeto
## Autores

- [@Otavio](https://github.com/OtavioTerceiro)
- [@Guilherme]()
- [@Jheimes]()

