# Gerador de Qr Code
Esse sistema tem o intuito de gerar qr code com base em uma lista de usuários.

## Executar o projeto

## Iniciar o docker e preparar os containers

**Nota:** Iniciar o serviço do docker, caso não esteja automático.

```bash
$ service docker start
```

**Nota** Em /laravel-qr-code, levante o container.

```bash
$ docker-compose up -d
```

## Instalar dependências

**Nota:** Em /laravel-qr-code, acesse o container qrcode-php-fpm.

```bash
$ docker exec -it qrcode-php-fpm bash
```

**Nota:** Dentro do diretório /application# execute o comando:

```bash
$ composer install
```

## Configurando

**Nota:** Dentro do container, será necessário dar permissão para escrita:

```bash
$ chmod 777 -R storage/ bootstrap/
```

**Nota:** Em /laravel-qr-code/src, copie e cole o arquivo .env.example para a pasta atual, em seguida,
renomeie para .env.


