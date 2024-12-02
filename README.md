# 🐳 Dockerfile Vulnerable - Frib1t's Playground

Este proyecto proporciona un entorno de práctica diseñado para entusiastas de la ciberseguridad que quieran mejorar sus habilidades en hacking, reconocimiento y escalada de privilegios dentro de un contenedor Docker.

---

## 🚀 Características principales

- **Sistema web con fugas de información**: Acceso un panel vulnerable.
- **SSH accesible**.
- **Escalada de privilegios**.
- **Flag** al completar la máquina.

---

## 📦 Construcción y uso del contenedor

1.Descarga el repositorio en local
```bash
git clone https://github.com/Frib1t/frib1t_lab/
```
2. Construye la imagen:
   ```bash
   sudo docker build -t frib1t .


3. Ejecuta el contenedor:

```bash
sudo docker run -dit -p 80:80 -p 22:22 --name frib1t-container frib1t
```

3. Confirma que el contenedor está corriendo:
```bash
sudo docker ps
```

4. La máquina estará disponible en:
- http://localhost
- Dirección IP de Docker (docker0): 172.17.0.2 (o similar)

----
🧹 Limpieza
Para detener y eliminar la máquina, ejecuta:
```bash
sudo docker stop $(sudo docker ps -a -q)
sudo docker rm $(sudo docker ps -a -q) --force
sudo docker rmi $(sudo docker images -q)
sudo docker volume rm $(sudo docker volume ls -q)
sudo docker network rm $(sudo docker network ls -q)
```

----
🤓 Créditos
Creado por Ramon Frizat aKa Frib1t.

[LinkedIn](https://www.linkedin.com/in/ramonfrizat/)

[GitHub](https://github.com/Frib1t)

[YouTube](https://www.youtube.com/@frib1t)


¡Sígueme para más contenido relacionado con ciberseguridad y proyectos prácticos! 🎉









