---
paths:
  - Dockerfile
---

# Dockerfile

## Docker: no-DB runtime, always generate .env + APP_KEY
App runs without a real database, so in Docker do NOT depend on sqlite: set SESSION_DRIVER=cookie, CACHE_STORE=array, QUEUE_CONNECTION=sync (overrides .env's database drivers). .dockerignore excludes .env, so the image must generate it: `cp .env.example .env && php artisan key:generate --force`, else "No application encryption key" at runtime. Install pdo_sqlite/sqlite3 anyway as a safety net.
