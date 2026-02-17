# ⚙️ Infrastructure & I/O

**PT-BR:** Camada de persistência e comunicação externa. Isola o Core de detalhes tecnológicos como SQL, APIs de terceiros e Cache.
**EN-US:** Persistence and external communication layer. Isolates the Core from technical details like SQL, third-party APIs, and Cache.

---

## 📡 Serviços e Integrações / Services & Integrations

1. **Transaction Manager:** Gestão de transações ACID entre múltiplos repositórios.
2. **PSR-3 Custom Logger:** Sistema de log multinível com integração para monitoramento externo.
3. **Fluent Query Builder:** Abstração de SQL para evitar erros de sintaxe e garantir segurança.
4. **Multi-Driver Cache:** Interface única para suporte a Redis, Memcached ou File System.
5. **Resilient API Client:** Cliente HTTP com lógica de retry, timeouts e circuit breaker.
