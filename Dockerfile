# Resmi Nginx imajını temel al
FROM nginx

# Lokaldeki HTML dosyasını /usr/share/nginx/html klasörüne kopyala
COPY index.html /usr/share/nginx/html

# Nginx sunucusunu başlat
CMD ["nginx", "-g", "daemon off;"]
