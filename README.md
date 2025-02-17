# Teste Desenvolvedor FullStack

Este é um projeto de um sistema de gestão, desenvolvido com Laravel 11, MySQL e PHPunit para testes unitários. A aplicação segue uma estrutura organizada com containers Docker para facilitar o desenvolvimento local.

---

## Tecnologias

- *Laravel 11*: framework PHP utilizado para o desenvolvimento da API.
- *MySQL*: Banco de dados utilizado para armazenar as informações.
- *PHPunit*: Framework de testes unitários utilizado no projeto.
- *Docker Compose*: Usado para rodar a aplicação e o banco de dados MySQL em containers.
- *Nginx*: Servidor web configurado para gerenciar as requisições.

---

## Setup

### Pré-requisitos

- Docker para rodar os containers.
- Docker Compose para gerenciar múltiplos containers (como o banco de dados e o servidor da aplicação).
- Node.js e npm para instalar as dependências JavaScript da aplicação.
- Composer: Gerenciador de dependências PHP, necessário para instalar as dependências do Laravel.


### Instalação

1. Clonar o repositório

   git clone https://github.com/LMartelini/testeDev.git

   cd testeDev
   

2. Configurar o ambiente

   npm install
   

3. Setar variáveis de ambiente

   Crie um arquivo .env na raíz do seu diretório e adicione as seguintes variáveis:

    DB_CONNECTION=mysql

    DB_HOST=mysql

    DB_PORT=3306

    DB_DATABASE=teste_dev

    DB_USERNAME=root

    DB_PASSWORD=password

    - Nota: Certifique-se de ajustar essas configurações conforme necessário para o seu ambiente de desenvolvimento. O DB_HOST deve apontar para o nome do container MySQL configurado no Docker, que, neste caso, é mysql.
  
    ### Subir os containers com Docker Compose
    
    1. Para rodar o projeto com Docker, execute o comando abaixo. Isso irá subir os containers para o Laravel, Nginx e MySQL:
    
       docker-compose up -d

   - Isso vai iniciar os containers para Laravel, Nginx e MySQL. O Docker Compose vai buscar o arquivo docker-compose.yml.

4. Gerar a chave da aplicação

    Após configurar o .env, execute o comando abaixo para gerar a chave de aplicação do Laravel (deve ser executado dentro do container do Laravel):

    php artisan key:generate


2. Executar as migrações do banco de dados

   php artisan migrate

   - Nota: O comando php artisan migrate é executado dentro do container da aplicação Laravel.
   

3. Iniciar a aplicação

   npm run dev

   Isso vai iniciar a aplicação, e ela estará disponível em http://localhost. 

### Rodar testes

Para rodar testes unitários, rode o comando:

php artisan test


---

<h3 align='center'>Desenvolvido por Laís Martelini</h3>
<div align='center'>
  <a href="mailto:laismartelini03@gmail.com" title="Gmail">
     <img src="https://img.shields.io/badge/-Gmail-FF0000?style=flat-square&labelColor=FF0000&logo=gmail&logoColor=white" alt="Gmail" style='height: 25px'/>
  </a>
  <a href="https://www.linkedin.com/in/laís-martelini/" title="LinkedIn">
     <img src="https://img.shields.io/badge/-Linkedin-0e76a8?style=flat-square&logo=Linkedin&logoColor=white" style='height: 25px' alt="LinkedIn"/>
  </a>
  <a href="https://api.whatsapp.com/send?phone=14998212174" title="WhatsApp">
     <img src="https://img.shields.io/badge/-WhatsApp-25d366?style=flat-square&labelColor=25d366&logo=whatsapp&logoColor=white" alt="WhatsApp" style='height: 25px'/>
  </a>
</div>
