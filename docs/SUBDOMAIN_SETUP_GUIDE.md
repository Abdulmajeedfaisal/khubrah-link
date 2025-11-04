# 🌐 دليل إعداد Subdomain مع XAMPP

**التاريخ:** 2025-11-03  
**البيئة:** Windows + XAMPP  
**الهدف:** فصل Admin Panel على subdomain منفصل

---

## 📋 **الخطوة 1: تعديل Hosts File**

### **المسار:**
```
C:\Windows\System32\drivers\etc\hosts
```

### **كيفية الفتح:**
1. افتح **Notepad** كـ **Administrator** (مهم جداً!)
   - اضغط بزر الماوس الأيمن على Notepad
   - اختر "Run as administrator"

2. في Notepad:
   - File → Open
   - انتقل إلى: `C:\Windows\System32\drivers\etc\`
   - غير "Text Documents" إلى "All Files"
   - افتح ملف `hosts`

### **أضف هذه الأسطر في النهاية:**
```
# Khubrah-Link Local Development
127.0.0.1 khubrahlink.test
127.0.0.1 admin.khubrahlink.test
```

### **احفظ الملف** (Ctrl+S)

---

## 📋 **الخطوة 2: إعداد Apache Virtual Hosts**

### **المسار:**
```
C:\xampp\apache\conf\extra\httpd-vhosts.conf
```

### **افتح الملف في Notepad**

### **أضف في النهاية:**
```apache
# Khubrah-Link - Public Site
<VirtualHost *:80>
    ServerName khubrahlink.test
    DocumentRoot "D:/projects/khubrah-link/public"
    
    <Directory "D:/projects/khubrah-link/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog "logs/khubrahlink-error.log"
    CustomLog "logs/khubrahlink-access.log" common
</VirtualHost>

# Khubrah-Link - Admin Panel
<VirtualHost *:80>
    ServerName admin.khubrahlink.test
    DocumentRoot "D:/projects/khubrah-link/public"
    
    <Directory "D:/projects/khubrah-link/public">
        Options Indexes FollowSymLinks
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog "logs/khubrahlink-admin-error.log"
    CustomLog "logs/khubrahlink-admin-access.log" common
</VirtualHost>
```

### **احفظ الملف** (Ctrl+S)

---

## 📋 **الخطوة 3: تفعيل Virtual Hosts في Apache**

### **المسار:**
```
C:\xampp\apache\conf\httpd.conf
```

### **ابحث عن هذا السطر:**
```apache
#Include conf/extra/httpd-vhosts.conf
```

### **احذف # من البداية ليصبح:**
```apache
Include conf/extra/httpd-vhosts.conf
```

### **احفظ الملف** (Ctrl+S)

---

## 📋 **الخطوة 4: إعادة تشغيل Apache**

1. افتح **XAMPP Control Panel**
2. اضغط **Stop** على Apache
3. انتظر 2 ثانية
4. اضغط **Start** على Apache

✅ إذا بدأ Apache بنجاح → ممتاز!  
❌ إذا لم يبدأ → هناك خطأ في الـ config

---

## 📋 **الخطوة 5: اختبار الإعداد**

افتح المتصفح وجرب:

```
http://khubrahlink.test
```

**المتوقع:**
- ✅ يفتح الموقع
- ✅ يظهر Landing Page

```
http://admin.khubrahlink.test
```

**المتوقع:**
- ✅ يفتح نفس الموقع
- ⚠️ حالياً سيظهر Landing (لأننا لم نعدل Routes بعد)

---

## ⚠️ **استكشاف الأخطاء:**

### **مشكلة: Apache لا يبدأ**
```
الحل:
1. افتح logs/error.log في XAMPP
2. ابحث عن السطر الأخير
3. غالباً خطأ في httpd-vhosts.conf
4. تأكد من المسار صحيح: D:/projects/khubrah-link/public
```

### **مشكلة: "This site can't be reached"**
```
الحل:
1. تأكد من تعديل hosts file
2. تأكد من حفظ الملف كـ Administrator
3. جرب: ipconfig /flushdns في CMD
```

### **مشكلة: يفتح localhost بدلاً من khubrahlink.test**
```
الحل:
1. تأكد من Apache يعمل
2. تأكد من Virtual Hosts مفعلة
3. أعد تشغيل Apache
```

---

## ✅ **بعد نجاح الإعداد:**

انتقل للخطوة التالية: تحديث Laravel Configuration

---

**هل واجهت أي مشكلة؟ أخبرني!** 🚀
