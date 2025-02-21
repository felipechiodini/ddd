para rodar o projeto:
alterar arquivo `.env.example` para `.env` então:
```docker compose up``` e ```docker exec -it app php artisan migrate```

vai estar disponivel no: http://localhost:9000

rodar testes: ```docker exec -it app php artisan test```
