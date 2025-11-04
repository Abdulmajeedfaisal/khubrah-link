# 💾 مخطط قاعدة البيانات - Khubrah-Link Platform
## Database Schema & Relationships

---

## 📊 نظرة عامة

قاعدة البيانات تتبع **Third Normal Form (3NF)** وتستخدم **MySQL 8.0+**

**عدد الجداول:** 8 جداول رئيسية

---

## 📋 الجداول التفصيلية

### 1️⃣ users - جدول المستخدمين

```sql
CREATE TABLE users (
    user_id INT PRIMARY KEY AUTO_INCREMENT,
    email VARCHAR(255) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    phone_number VARCHAR(20) NULL,
    location VARCHAR(100) NOT NULL,
    profile_picture VARCHAR(255) NULL,
    bio TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    email_verified BOOLEAN DEFAULT FALSE,
    is_active BOOLEAN DEFAULT TRUE,
    
    INDEX idx_email (email),
    INDEX idx_location (location),
    INDEX idx_created_at (created_at)
);
```

**الوصف:** يخزن معلومات جميع المستخدمين المسجلين

**العلاقات:**
- `1:N` مع `user_skills`
- `1:N` مع `sessions` (as provider)
- `1:N` مع `sessions` (as learner)
- `1:N` مع `reviews` (as reviewer)
- `1:N` مع `reviews` (as reviewee)
- `1:N` مع `messages` (as sender/receiver)

---

### 2️⃣ skills - جدول المهارات

```sql
CREATE TABLE skills (
    skill_id INT PRIMARY KEY AUTO_INCREMENT,
    skill_name VARCHAR(100) UNIQUE NOT NULL,
    category VARCHAR(50) NOT NULL,
    description TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    INDEX idx_skill_name (skill_name),
    INDEX idx_category (category)
);
```

**الوصف:** قائمة رئيسية بجميع المهارات المتاحة

**الفئات المحددة مسبقاً:**
- Technology (التقنية)
- Arts & Crafts (الفنون والحرف)
- Languages (اللغات)
- Music (الموسيقى)
- Sports (الرياضة)
- Home & Garden (المنزل والحديقة)
- Business Skills (مهارات الأعمال)
- Cooking & Culinary (الطبخ)
- Health & Fitness (الصحة واللياقة)
- Academic Subjects (المواد الأكاديمية)

**العلاقات:**
- `1:N` مع `user_skills`
- `1:N` مع `sessions`

---

### 3️⃣ user_skills - جدول مهارات المستخدمين (Pivot)

```sql
CREATE TABLE user_skills (
    user_skill_id INT PRIMARY KEY AUTO_INCREMENT,
    user_id INT NOT NULL,
    skill_id INT NOT NULL,
    skill_type ENUM('teach', 'learn') NOT NULL,
    experience_level VARCHAR(50) NULL COMMENT 'Beginner, Intermediate, Advanced, Expert',
    description TEXT NULL,
    preferred_mode ENUM('in-person', 'online', 'both') DEFAULT 'both',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(skill_id) ON DELETE RESTRICT,
    
    UNIQUE KEY unique_user_skill (user_id, skill_id, skill_type),
    INDEX idx_user_skill_type (user_id, skill_type),
    INDEX idx_skill_id (skill_id)
);
```

**الوصف:** يربط المستخدمين بالمهارات (تعليم أو تعلم)

**ملاحظات:**
- `skill_type = 'teach'`: المستخدم يقدم هذه المهارة
- `skill_type = 'learn'`: المستخدم يريد تعلم هذه المهارة
- `UNIQUE` constraint يمنع التكرار

---

### 4️⃣ sessions - جدول الجلسات

```sql
CREATE TABLE sessions (
    session_id INT PRIMARY KEY AUTO_INCREMENT,
    provider_id INT NOT NULL COMMENT 'User providing the skill',
    learner_id INT NOT NULL COMMENT 'User learning the skill',
    skill_id INT NOT NULL,
    session_date DATE NOT NULL,
    session_time TIME NOT NULL,
    duration INT DEFAULT 60 COMMENT 'Duration in minutes',
    location_type ENUM('in-person', 'online') NOT NULL,
    location_details VARCHAR(255) NULL COMMENT 'Address or meeting link',
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
    
    FOREIGN KEY (provider_id) REFERENCES users(user_id) ON DELETE SET NULL,
    FOREIGN KEY (learner_id) REFERENCES users(user_id) ON DELETE SET NULL,
    FOREIGN KEY (skill_id) REFERENCES skills(skill_id) ON DELETE RESTRICT,
    
    CHECK (provider_id != learner_id),
    
    INDEX idx_provider (provider_id),
    INDEX idx_learner (learner_id),
    INDEX idx_session_datetime (session_date, session_time),
    INDEX idx_status (status)
);
```

**الوصف:** يخزن جميع الجلسات المحجوزة

**حالات الجلسة:**
- `pending`: في انتظار قبول المقدم
- `confirmed`: تم القبول
- `completed`: تمت الجلسة
- `cancelled`: تم الإلغاء

**العلاقات:**
- `N:1` مع `users` (provider)
- `N:1` مع `users` (learner)
- `N:1` مع `skills`
- `1:N` مع `reviews`

---

### 5️⃣ reviews - جدول التقييمات

```sql
CREATE TABLE reviews (
    review_id INT PRIMARY KEY AUTO_INCREMENT,
    session_id INT NOT NULL,
    reviewer_id INT NOT NULL COMMENT 'User submitting the review',
    reviewee_id INT NOT NULL COMMENT 'User being reviewed',
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    review_text TEXT NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    is_visible BOOLEAN DEFAULT FALSE COMMENT 'Visible after both reviews or 7 days',
    
    FOREIGN KEY (session_id) REFERENCES sessions(session_id) ON DELETE CASCADE,
    FOREIGN KEY (reviewer_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (reviewee_id) REFERENCES users(user_id) ON DELETE CASCADE,
    
    UNIQUE KEY unique_session_reviewer (session_id, reviewer_id),
    
    INDEX idx_reviewee (reviewee_id),
    INDEX idx_session (session_id),
    INDEX idx_rating (rating)
);
```

**الوصف:** تقييمات ثنائية الاتجاه بعد إكمال الجلسات

**ملاحظات:**
- كل جلسة يمكن أن يكون لها تقييمان (من المقدم والمتعلم)
- التقييم من 1-5 نجوم + تعليق نصي
- `is_visible` يصبح `TRUE` بعد تقديم التقييمين أو بعد 7 أيام

---

### 6️⃣ messages - جدول الرسائل

```sql
CREATE TABLE messages (
    message_id INT PRIMARY KEY AUTO_INCREMENT,
    sender_id INT NOT NULL,
    receiver_id INT NOT NULL,
    message_text TEXT NOT NULL,
    is_read BOOLEAN DEFAULT FALSE,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    
    FOREIGN KEY (sender_id) REFERENCES users(user_id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES users(user_id) ON DELETE CASCADE,
    
    INDEX idx_conversation (sender_id, receiver_id, created_at),
    INDEX idx_unread (receiver_id, is_read)
);
```

**الوصف:** رسائل خاصة بين المستخدمين

**ملاحظات:**
- رسائل فورية (Real-time via WebSocket)
- حد أقصى 1000 حرف للرسالة
- `is_read` لتتبع الرسائل غير المقروءة

---

### 7️⃣ administrators - جدول المسؤولين

```sql
CREATE TABLE administrators (
    admin_id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) UNIQUE NOT NULL,
    password_hash VARCHAR(255) NOT NULL,
    email VARCHAR(255) UNIQUE NOT NULL,
    full_name VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    last_login TIMESTAMP NULL,
    
    INDEX idx_username (username)
);
```

**الوصف:** حسابات المسؤولين مع صلاحيات إدارية

---

### 8️⃣ reported_content - جدول المحتوى المبلغ عنه

```sql
CREATE TABLE reported_content (
    report_id INT PRIMARY KEY AUTO_INCREMENT,
    reporter_id INT NOT NULL,
    content_type ENUM('profile', 'review', 'message') NOT NULL,
    content_id INT NOT NULL COMMENT 'ID of the reported item',
    reason VARCHAR(255) NOT NULL,
    status ENUM('pending', 'reviewed', 'dismissed', 'action_taken') DEFAULT 'pending',
    admin_notes TEXT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    reviewed_at TIMESTAMP NULL,
    
    FOREIGN KEY (reporter_id) REFERENCES users(user_id) ON DELETE SET NULL,
    
    INDEX idx_status (status),
    INDEX idx_content (content_type, content_id)
);
```

**الوصف:** بلاغات المستخدمين عن محتوى غير لائق

---

## 🔗 مخطط العلاقات (ER Diagram)

```
┌─────────────┐
│    USER     │
└──────┬──────┘
       │
       ├─────────────┐
       │             │
       ▼             ▼
┌─────────────┐  ┌──────────────┐
│ USER_SKILL  │  │   SESSION    │
└──────┬──────┘  └──────┬───────┘
       │                │
       ▼                ▼
┌─────────────┐  ┌──────────────┐
│    SKILL    │  │    REVIEW    │
└─────────────┘  └──────────────┘

       ┌─────────────┐
       │   MESSAGE   │
       └─────────────┘
```

---

## 📈 استعلامات شائعة (Common Queries)

### 1. البحث عن مقدمي مهارة معينة

```sql
SELECT u.user_id, u.full_name, u.location, u.profile_picture,
       AVG(r.rating) as avg_rating,
       COUNT(DISTINCT s.session_id) as total_sessions
FROM users u
JOIN user_skills us ON u.user_id = us.user_id
JOIN skills sk ON us.skill_id = sk.skill_id
LEFT JOIN sessions s ON u.user_id = s.provider_id AND s.status = 'completed'
LEFT JOIN reviews r ON u.user_id = r.reviewee_id
WHERE us.skill_type = 'teach'
  AND sk.skill_name LIKE '%programming%'
  AND u.location = 'Riyadh'
GROUP BY u.user_id
ORDER BY avg_rating DESC, total_sessions DESC
LIMIT 12;
```

### 2. حساب متوسط تقييم المستخدم

```sql
SELECT u.user_id, u.full_name,
       AVG(r.rating) as average_rating,
       COUNT(r.review_id) as total_reviews
FROM users u
LEFT JOIN reviews r ON u.user_id = r.reviewee_id
WHERE u.user_id = ?
GROUP BY u.user_id;
```

### 3. جلب المحادثات الأخيرة

```sql
SELECT DISTINCT
    CASE 
        WHEN m.sender_id = ? THEN m.receiver_id
        ELSE m.sender_id
    END as other_user_id,
    u.full_name,
    u.profile_picture,
    (SELECT message_text FROM messages 
     WHERE (sender_id = ? AND receiver_id = other_user_id)
        OR (sender_id = other_user_id AND receiver_id = ?)
     ORDER BY created_at DESC LIMIT 1) as last_message,
    (SELECT created_at FROM messages 
     WHERE (sender_id = ? AND receiver_id = other_user_id)
        OR (sender_id = other_user_id AND receiver_id = ?)
     ORDER BY created_at DESC LIMIT 1) as last_message_time
FROM messages m
JOIN users u ON u.user_id = other_user_id
WHERE m.sender_id = ? OR m.receiver_id = ?
ORDER BY last_message_time DESC;
```

### 4. الجلسات القادمة للمستخدم

```sql
SELECT s.*, 
       sk.skill_name,
       CASE 
           WHEN s.provider_id = ? THEN 'provider'
           ELSE 'learner'
       END as my_role,
       CASE 
           WHEN s.provider_id = ? THEN l.full_name
           ELSE p.full_name
       END as other_party_name
FROM sessions s
JOIN skills sk ON s.skill_id = sk.skill_id
JOIN users p ON s.provider_id = p.user_id
JOIN users l ON s.learner_id = l.user_id
WHERE (s.provider_id = ? OR s.learner_id = ?)
  AND s.status IN ('pending', 'confirmed')
  AND s.session_date >= CURDATE()
ORDER BY s.session_date, s.session_time;
```

---

## 🔐 قواعد الأمان

### 1. Foreign Key Constraints

```sql
-- Cascade Delete: حذف البيانات المرتبطة
ON DELETE CASCADE  -- user_skills, messages, reviews

-- Set NULL: الاحتفاظ بالسجل مع إزالة المرجع
ON DELETE SET NULL  -- sessions (للسجل التاريخي)

-- Restrict: منع الحذف إذا كان هناك مراجع
ON DELETE RESTRICT  -- skills
```

### 2. Check Constraints

```sql
-- منع المستخدم من حجز جلسة مع نفسه
CHECK (provider_id != learner_id)

-- التقييم بين 1-5 فقط
CHECK (rating >= 1 AND rating <= 5)
```

### 3. Unique Constraints

```sql
-- منع التكرار
UNIQUE (user_id, skill_id, skill_type)  -- user_skills
UNIQUE (session_id, reviewer_id)        -- reviews
UNIQUE (email)                          -- users
```

---

## 📊 Indexes للأداء

```sql
-- Indexes على الأعمدة المستخدمة في البحث والفلترة
INDEX idx_email (email)
INDEX idx_location (location)
INDEX idx_skill_name (skill_name)
INDEX idx_category (category)
INDEX idx_session_datetime (session_date, session_time)
INDEX idx_status (status)

-- Composite Indexes للاستعلامات المعقدة
INDEX idx_user_skill_type (user_id, skill_type)
INDEX idx_conversation (sender_id, receiver_id, created_at)
```

---

## 🚀 Laravel Migrations

### مثال: Create Users Table

```php
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id('user_id');
            $table->string('email')->unique();
            $table->string('password_hash');
            $table->string('full_name', 100);
            $table->string('phone_number', 20)->nullable();
            $table->string('location', 100);
            $table->string('profile_picture')->nullable();
            $table->text('bio')->nullable();
            $table->boolean('email_verified')->default(false);
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('email');
            $table->index('location');
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
```

---

## ✅ Checklist للتنفيذ

- [ ] إنشاء جميع الـ Migrations (8 جداول)
- [ ] إضافة Foreign Keys والعلاقات
- [ ] إنشاء Indexes للأداء
- [ ] إنشاء Seeders للبيانات الأولية
- [ ] إنشاء Eloquent Models
- [ ] تعريف العلاقات في Models
- [ ] اختبار جميع الاستعلامات
- [ ] توثيق الـ API endpoints

---

**تم بحمد الله** 🎉
