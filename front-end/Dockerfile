#imagen base de Node.js
FROM node:18

#directorio de trabajo
WORKDIR /app

#dependencias
COPY package.json package-lock.json ./

# Instalar dependencias
RUN npm install

# Copiar código
COPY . .

# Compilar la aplicación Angular
RUN npm run build -- --prod


# Exponer el puerto 8100
EXPOSE 8100

# Comando para iniciar la aplicación
CMD ["ionic", "serve", "--external"]