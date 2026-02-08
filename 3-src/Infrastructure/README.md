# ⚙️ Infrastructure & I/O

**PT-BR:** Camada de saída e persistência. Aqui o sistema conversa com o mundo externo: bancos de dados, APIs de terceiros e sistemas de arquivos.
**EN-US:** Output and persistence layer. This is where the system communicates with the external world: databases, third-party APIs, and file systems.

---

## 📡 Integrações / Integrations

1. **Database Drivers:** Conexões otimizadas via PDO com suporte a transações ACID.
2. **Repositories:** Abstração da persistência, isolando o Core de detalhes do SQL.
3. **Services:** Wrappers para serviços externos (E-mail, Loggers, Cloud Storage).

---
*High availability starts with resilient infrastructure.*
