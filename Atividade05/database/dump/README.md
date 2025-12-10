markdown
# 💾 Dump do Banco de Dados - Exercício 5

## 📋 Descrição

Este dump contém a estrutura completa do banco de dados SQLite com dados de teste para o sistema de autenticação e autorização da API.

---

## 🗄️ Estrutura do Banco

### Tabelas Principais

#### 1. **users** - Usuários do Sistema
Contém os usuários com diferentes níveis de acesso (roles):
- `id` - Identificador único
- `name` - Nome completo
- `email` - Email (único)
- `password` - Senha (hashed)
- `role` - Papel do usuário (admin, professor, user)
- `email_verified_at` - Data de verificação do email
- `created_at` / `updated_at` - Timestamps

#### 2. **personal_access_tokens** - Tokens de Autenticação (Sanctum)
Gerencia os tokens de acesso da API:
- `id` - Identificador único
- `tokenable_type` / `tokenable_id` - Relacionamento polimórfico
- `name` - Nome do token
- `token` - Token hash
- `abilities` - Permissões
- `last_used_at` - Último uso
- `expires_at` - Data de expiração
- `created_at` / `updated_at` - Timestamps

#### 3. **professores** - Cadastro de Professores
- `id` - Identificador único
- `nome` - Nome completo
- `email` - Email de contato
- `departamento` - Departamento acadêmico
- `created_at` / `updated_at` - Timestamps

#### 4. **administradores** - Cadastro de Administradores
- `id` - Identificador único
- `nome` - Nome completo
- `email` - Email de contato
- `senha` - Senha (campo específico desta tabela)
- `created_at` / `updated_at` - Timestamps

#### 5. **salas** - Cadastro de Salas
- `id` - Identificador único
- `nome` - Nome/identificação da sala
- `capacidade` - Capacidade de pessoas
- `localizacao` - Localização física
- `created_at` / `updated_at` - Timestamps

---

## 👥 Usuários de Teste

### 🔴 Administrador (Acesso Total)

- Email: admin@example.com
- Senha: password
- Role: admin

**Permissões:**
- ✅ Acesso total a todos os recursos
- ✅ Gerenciar Professores (CRUD completo)
- ✅ Gerenciar Administradores (CRUD completo)
- ✅ Gerenciar Salas (CRUD completo)
- ✅ Gerenciar Usuários (CRUD completo)

---

### 🟡 Professor (Acesso Intermediário)

- Email: professor@example.com
- Senha: password
- Role: professor

**Permissões:**
- ✅ Visualizar Professores, Administradores e Salas
- ✅ Gerenciar Salas (criar, editar, deletar)
- ✅ Gerenciar apenas seus próprios dados de usuário
- ❌ Não pode gerenciar Professores e Administradores

---

### 🟢 Usuário Comum (Acesso Limitado)

- Email: user@example.com
- Senha: password
- Role: user

**Permissões:**
- ✅ Visualizar Professores, Administradores e Salas
- ✅ Gerenciar apenas seus próprios dados de usuário
- ❌ Não pode criar/editar/deletar nenhum outro recurso

---

## 🔄 Como Restaurar o Banco

### Opção 1: Copiar o arquivo SQLite

# Se você tem o arquivo database_ex5.sqlite
cp database/dump/database_ex5.sqlite database/database.sqlite

### Opção 2: Rodar Migrations e Seeders 


# Recriar banco do zero com dados de teste
php artisan migrate:fresh --seed


### Opção 3: Copiar o arquivo SQLite

# Se você tem o arquivo .sql
sqlite3 database/database.sqlite < database/dump/database_ex5_dump.sql
```

## 🧪 Testando a API

### 1️⃣ Iniciar o servidor
```bash
# No terminal, dentro da pasta exercicio5_backend2_api
php artisan serve

# O servidor estará rodando em: http://localhost:8000
``` 

### 2️⃣ Fazer Login e Obter Token

#Login como Admin

POST http://localhost:8000/api/login
Content-Type: application/json

{
    "email": "admin@example.com",
    "password": "password"
}

### 3️⃣  Usar o token nas requisições

GET http://localhost:8000/api/me
Authorization: Bearer seu_token_aqui

## 📦 Importar Collection do Postman

A collection completa está em: `tests/api/postman_collection_auth.json`

### Passos:
1. Abra o Postman
2. Click em **Import**
3. Selecione o arquivo `postman_collection_auth.json`
4. As variáveis já estão configuradas!
5. Execute **Login - Admin** para obter o token
6. O token será salvo automaticamente na variável `{{token}}`
7. Teste as outras requisições

---

## 🔐 Sistema de Autorização

### Rotas Públicas (GET)
- ✅ Listar e visualizar Professores
- ✅ Listar e visualizar Administradores
- ✅ Listar e visualizar Salas
- ✅ Login

### Rotas Protegidas (POST/PUT/DELETE)
- 🔒 Requer autenticação (token Bearer)
- 🔒 Validações de role específicas por recurso

### Regras de Acesso
- **Admin:** Acesso irrestrito a tudo
- **Professor:** Pode gerenciar Salas + seus dados
- **User:** Pode gerenciar apenas seus próprios dados

---

## 📊 Dados de Teste Incluídos

O seeder popula automaticamente:
- **3 usuários** (admin, professor, user)
- **Professores** (via ProfessorSeeder)
- **Administradores** (via AdministradorSeeder)
- **Salas** (via SalaSeeder)

---

## 🛠️ Tecnologias

- **Laravel 11+**
- **Laravel Sanctum** (autenticação via tokens)
- **SQLite** (banco de dados)
- **Gates** (autorização por roles)

---

## 📝 Observações

- Todos os tokens são armazenados na tabela `personal_access_tokens`
- Use `/logout` para revogar apenas o token atual
- Use `/logout-all` para revogar todos os tokens do usuário
- As senhas são hashadas com bcrypt
- O campo `role` é enum: `admin`, `professor`, `user`

---

## 🎯 Requisitos Atendidos

✅ Autenticação com Laravel Sanctum  
✅ Rotas POST/PUT/DELETE protegidas  
✅ Rotas GET públicas  
✅ Logout e Logout-All implementados  
✅ Usuários editam apenas seus dados  
✅ Role "professor" com acesso a Salas  
✅ Role "admin" com acesso total  
✅ Collection Postman com variáveis  
✅ Dump do banco com dados de teste  

---

**Exercício 5 - Backend 2 - Autenticação e Autorização API**