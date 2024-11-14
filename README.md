# ansible-kubernetes
ansible dev container with k3d, helm and kubectl

TLDR;

```
pip install -r requirements.txt
ansible-playbook playbook.yml
kubectl get pods
```

Then with the 0th pod do:

```
kubectl -n default port-forward wordpress-9c96b9b94-ltdln 8080:8080
```

This is a group assignment. The assignment is to instrument the php code in wordpress to do the REDS metrics and fix a few deficiencies. The marking scheme is:

|item|up to|
|--|--|
|capture REDS metrics|10|
|trace request through first 3 files|10|
|capture php, mariadb and apache logs|10|
|look carefully at the browser console log output and fix the images in the 2024 theme|5|
|change the theme and the topic to be the group's choice|5|
|make the wp-content folder so that it can be committed to your fork of this repository|5|
|make the mariadb data folder so that it can be committed to your fork of this repository
|total|50|

Wordpress is a monolith application. Hopefully you can see how monitoring, tracing and logging add to it's maintainability.


