---
paths:
  - api/index.php
---

# Api

## Force APP_MAINTENANCE_DRIVER because empty env breaks Laravel
In api/index.php, env vars are only set when `! getenv($key)` — but an env var that exists with an EMPTY value (like APP_MAINTENANCE_DRIVER='', e.g. set in the Vercel dashboard) is falsy too, so it IS overridden. This matters: empty APP_MAINTENANCE_DRIVER makes MaintenanceModeManager::getDefaultDriver() return '' → createDriver('') → Str::studly('') gives method 'createDriver' → self-recursion → ArgumentCountError. Always keep APP_MAINTENANCE_DRIVER=file in both api/index.php $envVars and vercel.json env.
