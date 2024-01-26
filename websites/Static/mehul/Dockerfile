# Use a lightweight web server
FROM nginx:alpine

# Copy the static site files to the nginx web root
COPY ./ /usr/share/nginx/html

# Expose port 80
EXPOSE 80

# Command to start the nginx server
CMD ["nginx", "-g", "daemon off;"]