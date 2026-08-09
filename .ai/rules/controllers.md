---
paths:
  - app/Http/Controllers/**
---
# Controllers

## Use Action Classes for Business Logic
Create a dedicated action class for any business logic and call it from the controller. Never put business rules directly in controllers; controllers should only orchestrate the request and return a response.
