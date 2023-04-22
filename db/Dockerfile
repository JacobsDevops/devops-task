# base image with MSSQL Server 
#FROM mcr.microsoft.com/mssql/server:2022-latest
FROM mcr.microsoft.com/mssql/server:2019-latest

#ENV ACCEPT_EULA=Y \
    #SA_PASSWORD=Un!q@to2023

ENV ACCEPT_EULA=Y \
    MSSQL_SA_PASSWORD=Un!q@to2023 \
    MSSQL_PID=Developer

COPY ./init.sql /docker-entrypoint-initdb.d/
# Expose port
EXPOSE 1433

#EXPOSE 1433/tcp

#CMD ["/opt/mssql/bin/sqlservr"]