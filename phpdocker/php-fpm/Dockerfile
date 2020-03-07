FROM phpdockerio/php72-fpm:latest
WORKDIR "/application"

RUN apt-get clean all \
    && apt-get update \
    && apt-get -y --no-install-recommends install php7.2-gd \
    # Pacotes usados apenas para construção do container
        wget \
    # Resolve o problema de fontes True Type no WKHtmlToPDF
        fonts-texgyre \

    # Resolve o problema de dependencia no WKHtmlToPDF
        libxrender1 \
        libfontconfig1 \
        libx11-dev \
        libjpeg62 \
        libxtst6 \

    # WKHtml to PDF
    && wget https://github.com/h4cc/wkhtmltopdf-amd64/blob/master/bin/wkhtmltopdf-amd64?raw=true -O /usr/local/bin/wkhtmltopdf \
    && chmod +x /usr/local/bin/wkhtmltopdf \

    ### Remover os pacotes usados na construção do container
    && export SUDO_FORCE_REMOVE=yes \
    && apt-get purge -y -q \
        wget \

    # && apt-get autoremove -y -q \
    && apt-get clean -y -q \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/* /usr/share/doc/* \

# Fix debconf warnings upon build
ARG DEBIAN_FRONTEND=noninteractive