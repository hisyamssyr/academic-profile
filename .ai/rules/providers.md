---
paths:
  - app/Providers/AppServiceProvider.php
---

# Providers

## Force HTTPS scheme for generated URLs on Vercel
Vercel terminates TLS, so the PHP function sees requests as HTTP. If URL::forceScheme('https') is not set (guarded by VERCEL env), asset()/url()/route() generate absolute http:// links (e.g. Vite asset paths) which browsers block as mixed content on an https page — page appears unstyled with broken images. Root cause of the "UI tidak render" bug. Do NOT use forceRootUrl alone; asset() replaces the scheme with the request scheme, so forceScheme is required.
