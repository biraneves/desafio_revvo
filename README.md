# Desafio Revvo

Este é o projeto para o desafio técnico da Revvo, uma aplicação web para gerenciar cursos.
O projeto utiliza PHP para o backend e HTML5, CSS e JavaScript para o frontend, garantindo uma experiência
responsiva e agradável para os usuários.

## Identificação do autor

- **Autor:** Ubirajara Neves
- **Cargo:** Desenvolvedor full-stack, com foco em back-end

## Estrutura do Projeto

- **src**: Contém os arquivos PHP do backend.
  - **Config**: arquivo de configuração de rotas.
  - **Controllers**: Controladores da aplicação.
  - **Entities**: Entidades do domínio.
  - **Infrastructure**: Repositórios e outras classes de infraestrutura.
  - **scss**: Contém os arquivos SCSS para estilização.
  - **Views**: Arquivos de visualização (HTML e PHP).
- **public**: Contém os arquivos públicos acessíveis pelo navegador.
  - **css**: Arquivos CSS gerados a partir do SCSS.
  - **img**: Imagens usadas na aplicação.
  - **js**: Arquivo JavaScript.

## Instalação

1. Clone o repositório:
   ```sh
   git clone https://github.com/seu-usuario/desafio-revvo.git
   ```

2. Navegue até o diretório do projeto:
   ```sh
   cd desafio-revvo
   ```

3. Gere o autoloader do Composer:
   ```sh
   composer dumpautoload
   ```

4. Compile os arquivos SCSS para CSS:
   ```sh
   npm install
   npm run build-css
   ```

## Uso

1. Inicie o servidor PHP:
   ```sh
   php -S localhost:8080 -t public
   ```

2. Abra o navegador e acesse: [http://localhost:8000](http://localhost:8000)

## Funcionalidades

- **Gerenciamento de cursos:** Adiconar e listar cursos implementados no *front-end*. Todo o CRUD implementado no *back-end*.
- **Responsividade:** *Layout* responsivo para diferentes tamanhos de tela.
- **Modal:** Exibição de modal para novos usuários.
