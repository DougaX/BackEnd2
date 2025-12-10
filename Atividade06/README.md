# Atividade 06 - API com Relacionamentos

Sistema de gerenciamento de salas com autenticação, autorização e relacionamentos entre entidades.

## 🚀 Funcionalidades

- **Autenticação JWT** com Laravel Sanctum
- **Sistema de Roles** (admin, professor, user)
- **Relacionamentos** entre Users, Professores, Administradores, Salas e Reservas
- **CRUD completo** para todas as entidades
- **Upload de arquivos** (bônus)
- **Seeders e Factories** para dados de teste

## 📋 Relacionamentos Implementados

### User (1:1)
- `User` → `Professor`
- `User` → `Administrador`

### User (1:N)
- `User` → `Reservas`

### Professor (1:N)
- `Professor` → `Salas` (como responsável)

### Sala (1:N)
- `Sala` → `Reservas`

### Reserva (N:1)
- `Reserva` → `User`
- `Reserva` → `Sala`

## 🛠️ Instalação e Execução

### Pré-requisitos
- PHP 8.1+
- Composer
- SQLite (ou MySQL/PostgreSQL)

### Passos para instalação

1. **Clone o repositório**
```bash
git clone <url-do-repositorio>
cd atividade06_backend2_api
```

2. **Instale as dependências**
```bash
composer install
```

3. **Configure o ambiente**
```bash
cp .env.example .env
php artisan key:generate
```

4. **Configure o banco de dados**
Edite o arquivo `.env` com suas configurações de banco:
```env
DB_CONNECTION=sqlite
DB_DATABASE=database/database.sqlite
```

5. **Execute as migrations e seeders**
```bash
php artisan migrate:fresh --seed
```

6. **Inicie o servidor**
```bash
php artisan serve
```

## 📚 Endpoints da API

### Autenticação
- `POST /api/login` - Login
- `POST /api/logout` - Logout (autenticado)
- `GET /api/me` - Dados do usuário (autenticado)

### Usuários
- `GET /api/users` - Listar usuários (autenticado)
- `POST /api/users` - Criar usuário (autenticado)
- `GET /api/users/{id}` - Visualizar usuário (autenticado)
- `PUT /api/users/{id}` - Atualizar usuário (autenticado)
- `DELETE /api/users/{id}` - Deletar usuário (autenticado)

### Professores
- `GET /api/professores` - Listar professores
- `POST /api/professores` - Criar professor (admin)
- `GET /api/professores/{id}` - Visualizar professor
- `PUT /api/professores/{id}` - Atualizar professor (admin)
- `DELETE /api/professores/{id}` - Deletar professor (admin)

### Administradores
- `GET /api/administradores` - Listar administradores
- `POST /api/administradores` - Criar administrador (admin)
- `GET /api/administradores/{id}` - Visualizar administrador
- `PUT /api/administradores/{id}` - Atualizar administrador (admin)
- `DELETE /api/administradores/{id}` - Deletar administrador (admin)

### Salas
- `GET /api/salas` - Listar salas
- `POST /api/salas` - Criar sala (professor/admin)
- `GET /api/salas/{id}` - Visualizar sala
- `PUT /api/salas/{id}` - Atualizar sala (professor/admin)
- `DELETE /api/salas/{id}` - Deletar sala (professor/admin)

### Reservas
- `GET /api/reservas` - Listar reservas
- `POST /api/reservas` - Criar reserva (autenticado)
- `GET /api/reservas/{id}` - Visualizar reserva
- `PUT /api/reservas/{id}` - Atualizar reserva (autenticado)
- `DELETE /api/reservas/{id}` - Deletar reserva (autenticado)

### Upload de Arquivos (Bônus)
- `POST /api/upload` - Upload de arquivo (autenticado)
- `DELETE /api/upload` - Deletar arquivo (autenticado)

## 🔐 Autenticação

Para acessar endpoints protegidos, inclua o token no header:
```
Authorization: Bearer {seu-token}
```

### Usuários de teste
- **Admin**: admin@example.com / password
- **Professor**: professor@example.com / password
- **User**: user@example.com / password

## 📁 Estrutura do Projeto

```
app/
├── Http/Controllers/Api/
│   ├── AuthController.php
│   ├── UserApiController.php
│   ├── ProfessorApiController.php
│   ├── AdministradorApiController.php
│   ├── SalaApiController.php
│   ├── ReservaApiController.php
│   └── FileUploadController.php
├── Models/
│   ├── User.php
│   ├── Professor.php
│   ├── Administrador.php
│   ├── Sala.php
│   └── Reserva.php
database/
├── factories/
├── migrations/
└── seeders/
```

## 🧪 Testando a API

### Exemplo de login
```bash
curl -X POST http://localhost:8000/api/login \
  -H "Content-Type: application/json" \
  -d '{"email":"admin@example.com","password":"password"}'
```

### Exemplo de criação de reserva
```bash
curl -X POST http://localhost:8000/api/reservas \
  -H "Authorization: Bearer {token}" \
  -H "Content-Type: application/json" \
  -d '{
    "sala_id": 1,
    "data_inicio": "2025-12-15 09:00:00",
    "data_fim": "2025-12-15 11:00:00",
    "finalidade": "Reunião de equipe"
  }'
```

## 🎯 Funcionalidades Implementadas

- ✅ Migrations com chaves estrangeiras (0,25 pts)
- ✅ Relacionamentos nos Models Eloquent (0,5 pts)
- ✅ Factories para dados aleatórios (0,125 pts)
- ✅ Seeders para popular o banco (0,125 pts)
- ✅ API refatorada com relacionamentos (1 pt)
- ✅ Upload de arquivos - BÔNUS (0,5 pts)

**Total: 2,5 pontos**

## 🔧 Tecnologias Utilizadas

- Laravel 11
- Laravel Sanctum (autenticação)
- SQLite (banco de dados)
- Eloquent ORM
- Factory & Seeders
- Storage (upload de arquivos)

## 📝 Observações

- Todos os relacionamentos estão funcionais
- Sistema de permissões implementado
- Upload de arquivos com validação
- Dados de teste gerados automaticamente
- API RESTful seguindo padrões