FROM node:20-alpine

# Copy the rest of the app
COPY ./vue /app

WORKDIR /app

RUN npm install

# Default command for development
CMD ["npm", "run", "dev"]