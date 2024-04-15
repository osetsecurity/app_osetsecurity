# Use an existing Docker image as a base
FROM nginx:alpine

# Copy the contents of the current directory into the container at /usr/share/nginx/html
COPY . /usr/share/nginx/html

# Expose port 80 to the outside world
EXPOSE 80

# Command to run the web server
CMD ["nginx", "-g", "daemon off;"]
