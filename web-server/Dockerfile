FROM php:8-apache

#ENV DEBIAN_FRONTEND=noninteractive

RUN apt-get update 
#RUN apt-get install apt-utils
RUN apt-get install -y gnupg2   
RUN curl https://packages.microsoft.com/keys/microsoft.asc | apt-key add - && \
    curl https://packages.microsoft.com/config/ubuntu/22.04/prod.list > /etc/apt/sources.list.d/mssql-release.list 
RUN apt-get update && \
    ACCEPT_EULA=Y apt-get install -y msodbcsql18    
#RUN apt-get install -y unixodbc-dev 
RUN apt-get update && \
    ACCEPT_EULA=Y apt-get install -y msodbcsql18 mssql-tools unixodbc-dev \
    && apt-get install -y libltdl-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*
RUN pecl install sqlsrv pdo_sqlsrv
RUN docker-php-ext-enable sqlsrv pdo_sqlsrv 

# Set environment variables for mssql-tools
ENV PATH="/opt/mssql-tools/bin:${PATH}"
ENV MSSQL_CLI_TELEMETRY_OPTOUT="true"

# Copy the PHP script to the web-root folder
COPY ./index.php /var/www/html/



# Expose port 80 for HTTP traffic
EXPOSE 8000