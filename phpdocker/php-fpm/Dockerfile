FROM phpdockerio/php72-fpm:latest
WORKDIR "/application"

RUN apt-get clean all \
    && apt-get update \
    && apt-get -y --no-install-recommends install php7.2-gd \
    # Pacotes usados apenas para construção do container
        wget \
    # Resolve o problema de fontes True Type no WKHtmlToPDF
        fonts-texgyre \
        gdebi \

    # Libjpeg62-turbo
    && wget http://security.debian.org/debian-security/pool/updates/main/libj/libjpeg-turbo/libjpeg62-turbo_1.3.1-12+deb8u2_amd64.deb \
    && gdebi --n libjpeg62-turbo_1.3.1-12+deb8u2_amd64.deb \
    && rm libjpeg62-turbo_1.3.1-12+deb8u2_amd64.deb \

    # WKHtml to PDF
    && wget http://se.archive.ubuntu.com/ubuntu/pool/main/libp/libpng/libpng12-0_1.2.54-1ubuntu1_amd64.deb \
    && gdebi --n libpng12-0_1.2.54-1ubuntu1_amd64.deb \

    && wget https://github.com/wkhtmltopdf/wkhtmltopdf/releases/download/0.12.2.1/wkhtmltox-0.12.2.1_linux-jessie-amd64.deb \
    && gdebi --n wkhtmltox-0.12.2.1_linux-jessie-amd64.deb \
    && rm wkhtmltox-0.12.2.1_linux-jessie-amd64.deb \

    ### Remover os pacotes usados na construção do container
    && export SUDO_FORCE_REMOVE=yes \
    && apt-get purge -y -q \
        wget \
        gdebi \

    # && apt-get autoremove -y -q \
    && apt-get clean -y -q \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive