# base image with MSSQL Server 
#FROM mcr.microsoft.com/mssql/server:2022-latest
FROM mcr.microsoft.com/mssql/server:2019-latest


ENV ACCEPT_EULA=Y \
    MSSQL_SA_PASSWORD=Un!q@to2023 \
    MSSQL_PID=Developer



#COPY ./db/init.sql /docker-entrypoint-initdb.d/ this does not work in mcr.microsoft.com/mssql images use the scripts below 

RUN /opt/mssql/bin/sqlservr --accept-eula & sleep 30  && \
    /opt/mssql-tools/bin/sqlcmd -S localhost -U sa -P 'Un!q@to2023' -Q 'CREATE DATABASE db_vero_digital'

# Expose port
EXPOSE 1433

