# cptv.cz

```
$ docker build -f Dockerfile.nginx -t pdostal/cptv-nginx:latest .
$ docker build -f Dockerfile.fpm -t pdostal/cptv-fpm:latest .
$ docker push pdostal/cptv-fpm:latest
$ docker push pdostal/cptv-nginx:latest
```

