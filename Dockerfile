FROM ubuntu:latest

MAINTAINER Ramon Frizat aKa frib1t "fribit@protonmail.com"

RUN apt update && apt install -y \
    net-tools \
    iputils-ping \
    curl \
    git \
    apache2 \
    php \
    php-cli \
    php-curl \
    php-mysql \
    nano \
    sudo \
    coreutils \
    mariadb-server \
    openssh-server \
    wget \
    unzip \
    libapache2-mod-php \
    less

RUN rm -rf /var/www/html/*

RUN sed -i '/<Directory \/var\/www\/>/,/<\/Directory>/d' /etc/apache2/apache2.conf && \
    echo '<Directory /var/www/html>' >> /etc/apache2/apache2.conf && \
    echo '    Options Indexes FollowSymLinks' >> /etc/apache2/apache2.conf && \
    echo '    AllowOverride All' >> /etc/apache2/apache2.conf && \
    echo '    Require all granted' >> /etc/apache2/apache2.conf && \
    echo '</Directory>' >> /etc/apache2/apache2.conf && \
    echo "ServerName localhost" >> /etc/apache2/apache2.conf

COPY web/ /var/www/html/
RUN chmod -R 755 /var/www/html/

RUN echo " Buenos dias, Las credenciales para la nueva empleada son: alice:qw3rt4abcd" > /var/www/html/creds.txt && chmod 644 /var/www/html/creds.txt

RUN useradd -m -s /bin/bash frib1t && echo "frib1t:M@qu1n@L0k@3" | chpasswd && usermod -aG sudo frib1t && echo "frib1t ALL=(ALL) NOPASSWD:ALL" >> /etc/sudoers
RUN useradd -m -s /bin/bash alice && echo "alice:qw3rt4abcd" | chpasswd

RUN mkdir -p /home/frib1t/.ssh && ssh-keygen -t rsa -b 2048 -f /home/frib1t/.ssh/id_rsa -q -N "" && chown -R frib1t:frib1t /home/frib1t/.ssh && chmod 600 /home/frib1t/.ssh/id_rsa && cat /home/frib1t/.ssh/id_rsa.pub >> /home/frib1t/.ssh/authorized_keys && chmod 600 /home/frib1t/.ssh/authorized_keys && chown frib1t:frib1t /home/frib1t/.ssh/authorized_keys

RUN rm -rf authorized_keys
RUN cp /home/frib1t/.ssh/id_rsa.pub /home/frib1t/.ssh/authorized_keys

RUN chown frib1t:frib1t $(which tac)
RUN chmod 4755 $(which tac) 
RUN echo "¿No quieres llegar más alto?" > /home/frib1t/Nota.txt && chmod 600 /home/frib1t/Nota.txt
RUN echo -e "\n\nFelicidades ahora eres root\n\nSi te ha gustado, sígueme en LinkedIn: https://www.linkedin.com/in/ramonfrizat/\nGitHub: https://github.com/Frib1t\nYouTube: https://www.youtube.com/@frib1t" > /root/flag.txt && chmod 600 /root/flag.txt
RUN chown frib1t:frib1t /home/frib1t/Nota.txt

RUN echo -e "\n\nFelicidades has logrado ganar acceso\n\nYa tienes la primera flag" > /home/alice/flag.txt && chmod 600 /home/alice/flag.txt

COPY start.sh /start.sh
RUN chmod +x /start.sh

RUN chmod 4755 $(which tac) 

CMD ["/start.sh"]
