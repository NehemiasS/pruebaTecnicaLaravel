#imagen base de Node.js
FROM node:18

#directorio de trabajo
WORKDIR /app

#dependencias
COPY package.json package-lock.json ./

# Instalar dependencias
RUN npm install

#RUN npm install -g @ionic/cli


# Copiar código
COPY . .

# Compilar la aplicación Angular
RUN npm run build -- --prod
RUN groupadd --force -g 1000 sail
#RUN ls -l /app
# Exponer el puerto
EXPOSE 4200

# Comando para iniciar la aplicación
CMD ["npm", "start"]
#CMD ["ionic", "serve", "--external"]