# 🚀 Backend Development Handoff - Khubrah-Link

**التاريخ:** 2025-11-03  
**الحالة:** Frontend مكتمل 100% - جاهز للـ Backend Integration  
**المطور Frontend:** Cascade AI + User

---

## 📋 نظرة عامة

تم إكمال جميع واجهات المستخدمين والإدارة (27 واجهة). المشروع جاهز الآن لربط Frontend بـ Backend.

### ✅ ما تم إنجازه:
- ✅ **27 واجهة مكتملة** (100% من Frontend)
  - ✅ 18 واجهة مستخدمين
  - ✅ 10 واجهات Admin Panel
- ✅ تصميم موحد واحترافي
- ✅ RTL + Dark Mode + Responsive
- ✅ Alpine.js Interactions
- ✅ Routes جاهزة (User + Admin)
- ✅ Controllers هيكلية جاهزة

---

## 🗂️ هيكل المشروع

```
khubrah-link/
├── app/
│   ├── Http/Controllers/
│   │   ├── ProfileController.php ✅ (Breeze)
│   │   ├── SkillController.php ⬜ (يحتاج تطوير)
│   │   ├── PublicProfileController.php ⬜ (يحتاج تطوير)
│   │   ├── SessionController.php ✅ (هيكل جاهز)
│   │   ├── ReviewController.php ✅ (هيكل جاهز)
│   │   ├── MessageController.php ✅ (هيكل جاهز)
│   │   └── NotificationController.php ✅ (هيكل جاهز)
│   └── Models/
│       └── User.php ✅ (Breeze)
│
├── resources/views/
│   ├── pages/
│   │   ├── landing.blade.php ✅
│   │   ├── browse.blade.php ✅
│   │   └── public-profile.blade.php ✅
│   ├── dashboard.blade.php ✅
│   ├── profile/
│   │   ├── show.blade.php ✅
│   │   └── edit.blade.php ✅
│   ├── skills/
│   │   └── manage.blade.php ✅
│   ├── sessions/
│   │   ├── index.blade.php ✅
│   │   ├── book.blade.php ✅
│   │   └── show.blade.php ✅
│   ├── messages/
│   │   └── index.blade.php ✅
│   ├── reviews/
│   │   └── create.blade.php ✅
│   ├── notifications/
│   │   └── index.blade.php ✅
│   ├── settings.blade.php ✅
│   └── admin/
│       ├── dashboard.blade.php ✅
│       ├── users/
│       │   ├── index.blade.php ✅
│       │   └── show.blade.php ✅
│       ├── reports/
│       │   ├── index.blade.php ✅
│       │   └── show.blade.php ✅
│       ├── categories/
│       │   └── index.blade.php ✅
│       ├── sessions/
│       │   └── index.blade.php ✅
│       ├── analytics.blade.php ✅
│       └── settings.blade.php ✅
│
└── routes/
    ├── web.php ✅
    └── admin.php ✅ (10 routes)
```

---

## 🗄️ Database Schema المطلوب

### 1. Skills Table
```sql
CREATE TABLE skills (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    name_en VARCHAR(255),
    category VARCHAR(100),
    icon VARCHAR(255), -- emoji or icon class
    description TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    
    INDEX idx_category (category)
);
```

### 2. User Skills Table (Pivot)
```sql
CREATE TABLE user_skills (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NOT NULL,
    skill_id BIGINT UNSIGNED NOT NULL,
    type ENUM('teaching', 'learning') NOT NULL,
    level ENUM('beginner', 'intermediate', 'advanced'),
    years_experience INT,
    description TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE,
    UNIQUE KEY unique_user_skill_type (user_id, skill_id, type),
    INDEX idx_type (type)
);
```

### 3. Sessions Table
```sql
CREATE TABLE sessions (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    provider_id BIGINT UNSIGNED NOT NULL, -- المعلم
    learner_id BIGINT UNSIGNED NOT NULL, -- المتعلم
    skill_id BIGINT UNSIGNED NOT NULL,
    date DATE NOT NULL,
    start_time TIME NOT NULL,
    end_time TIME NOT NULL,
    duration INT NOT NULL, -- بالدقائق
    type ENUM('online', 'in_person') NOT NULL,
    location VARCHAR(255), -- للجلسات الحضورية
    meeting_link VARCHAR(500), -- للجلسات عن بعد
    status ENUM('pending', 'confirmed', 'completed', 'cancelled') DEFAULT 'pending',
    notes TEXT,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    
    FOREIGN KEY (provider_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (learner_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (skill_id) REFERENCES skills(id) ON DELETE CASCADE,
    INDEX idx_provider (provider_id),
    INDEX idx_learner (learner_id),
    INDEX idx_status (status),
    INDEX idx_date (date)
);
```

### 4. Reviews Table
```sql
CREATE TABLE reviews (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    session_id BIGINT UNSIGNED NOT NULL,
    reviewer_id BIGINT UNSIGNED NOT NULL, -- من يكتب التقييم
    reviewee_id BIGINT UNSIGNED NOT NULL, -- من يتم تقييمه
    rating INT NOT NULL CHECK (rating >= 1 AND rating <= 5),
    communication_rating INT CHECK (communication_rating >= 1 AND communication_rating <= 5),
    knowledge_rating INT CHECK (knowledge_rating >= 1 AND knowledge_rating <= 5),
    patience_rating INT CHECK (patience_rating >= 1 AND patience_rating <= 5),
    preparation_rating INT CHECK (preparation_rating >= 1 AND preparation_rating <= 5),
    comment TEXT NOT NULL,
    would_recommend BOOLEAN DEFAULT true,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    
    FOREIGN KEY (session_id) REFERENCES sessions(id) ON DELETE CASCADE,
    FOREIGN KEY (reviewer_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (reviewee_id) REFERENCES users(id) ON DELETE CASCADE,
    UNIQUE KEY unique_session_review (session_id, reviewer_id),
    INDEX idx_reviewee (reviewee_id)
);
```

### 5. Messages Table
```sql
CREATE TABLE messages (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    sender_id BIGINT UNSIGNED NOT NULL,
    receiver_id BIGINT UNSIGNED NOT NULL,
    message TEXT NOT NULL,
    is_read BOOLEAN DEFAULT false,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    
    FOREIGN KEY (sender_id) REFERENCES users(id) ON DELETE CASCADE,
    FOREIGN KEY (receiver_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_sender (sender_id),
    INDEX idx_receiver (receiver_id),
    INDEX idx_is_read (is_read),
    INDEX idx_created_at (created_at)
);
```

### 6. Notifications Table
```sql
CREATE TABLE notifications (
    id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
    user_id BIGINT UNSIGNED NOT NULL,
    type VARCHAR(100) NOT NULL, -- session_confirmed, new_message, new_review, etc.
    title VARCHAR(255) NOT NULL,
    message TEXT NOT NULL,
    data JSON, -- بيانات إضافية
    is_read BOOLEAN DEFAULT false,
    created_at TIMESTAMP,
    updated_at TIMESTAMP,
    
    FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
    INDEX idx_user_id (user_id),
    INDEX idx_is_read (is_read),
    INDEX idx_type (type)
);
```

### 7. Users Table (تحديثات مطلوبة)
```sql
ALTER TABLE users ADD COLUMN (
    username VARCHAR(100) UNIQUE,
    bio TEXT,
    location VARCHAR(255),
    phone VARCHAR(20),
    avatar VARCHAR(255),
    is_provider BOOLEAN DEFAULT false,
    is_learner BOOLEAN DEFAULT false,
    total_sessions INT DEFAULT 0,
    average_rating DECIMAL(3,2) DEFAULT 0.00,
    response_rate INT DEFAULT 0,
    INDEX idx_username (username)
);
```

---

## 🔗 Models & Relationships المطلوبة

### 1. Skill Model
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Skill extends Model
{
    protected $fillable = [
        'name', 'name_en', 'category', 'icon', 'description'
    ];

    public function users()
    {
        return $this->belongsToMany(User::class, 'user_skills')
            ->withPivot('type', 'level', 'years_experience', 'description')
            ->withTimestamps();
    }

    public function providers()
    {
        return $this->belongsToMany(User::class, 'user_skills')
            ->wherePivot('type', 'teaching')
            ->withPivot('level', 'years_experience', 'description')
            ->withTimestamps();
    }

    public function learners()
    {
        return $this->belongsToMany(User::class, 'user_skills')
            ->wherePivot('type', 'learning')
            ->withPivot('level', 'description')
            ->withTimestamps();
    }

    public function sessions()
    {
        return $this->hasMany(Session::class);
    }
}
```

### 2. Session Model
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Session extends Model
{
    protected $fillable = [
        'provider_id', 'learner_id', 'skill_id',
        'date', 'start_time', 'end_time', 'duration',
        'type', 'location', 'meeting_link',
        'status', 'notes'
    ];

    protected $casts = [
        'date' => 'date',
        'start_time' => 'datetime',
        'end_time' => 'datetime',
    ];

    public function provider()
    {
        return $this->belongsTo(User::class, 'provider_id');
    }

    public function learner()
    {
        return $this->belongsTo(User::class, 'learner_id');
    }

    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }

    public function review()
    {
        return $this->hasOne(Review::class);
    }
}
```

### 3. Review Model
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    protected $fillable = [
        'session_id', 'reviewer_id', 'reviewee_id',
        'rating', 'communication_rating', 'knowledge_rating',
        'patience_rating', 'preparation_rating',
        'comment', 'would_recommend'
    ];

    protected $casts = [
        'would_recommend' => 'boolean',
    ];

    public function session()
    {
        return $this->belongsTo(Session::class);
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function reviewee()
    {
        return $this->belongsTo(User::class, 'reviewee_id');
    }
}
```

### 4. Message Model
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $fillable = [
        'sender_id', 'receiver_id', 'message', 'is_read'
    ];

    protected $casts = [
        'is_read' => 'boolean',
    ];

    public function sender()
    {
        return $this->belongsTo(User::class, 'sender_id');
    }

    public function receiver()
    {
        return $this->belongsTo(User::class, 'receiver_id');
    }
}
```

### 5. Notification Model
```php
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    protected $fillable = [
        'user_id', 'type', 'title', 'message', 'data', 'is_read'
    ];

    protected $casts = [
        'data' => 'array',
        'is_read' => 'boolean',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
```

### 6. User Model (تحديثات)
```php
// إضافة إلى User Model الموجود:

public function teachingSkills()
{
    return $this->belongsToMany(Skill::class, 'user_skills')
        ->wherePivot('type', 'teaching')
        ->withPivot('level', 'years_experience', 'description')
        ->withTimestamps();
}

public function learningSkills()
{
    return $this->belongsToMany(Skill::class, 'user_skills')
        ->wherePivot('type', 'learning')
        ->withPivot('level', 'description')
        ->withTimestamps();
}

public function providedSessions()
{
    return $this->hasMany(Session::class, 'provider_id');
}

public function learnedSessions()
{
    return $this->hasMany(Session::class, 'learner_id');
}

public function sentMessages()
{
    return $this->hasMany(Message::class, 'sender_id');
}

public function receivedMessages()
{
    return $this->hasMany(Message::class, 'receiver_id');
}

public function reviews()
{
    return $this->hasMany(Review::class, 'reviewee_id');
}

public function notifications()
{
    return $this->hasMany(Notification::class);
}
```

---

## 📝 المهام المطلوبة من Backend Developer

### المرحلة 1: Database Setup (أولوية عالية) 🔴

**الوقت المتوقع:** 2-3 ساعات

1. ✅ **إنشاء Migrations:**
   ```bash
   php artisan make:migration create_skills_table
   php artisan make:migration create_user_skills_table
   php artisan make:migration create_sessions_table
   php artisan make:migration create_reviews_table
   php artisan make:migration create_messages_table
   php artisan make:migration create_notifications_table
   php artisan make:migration add_profile_fields_to_users_table
   ```

2. ✅ **إنشاء Models:**
   ```bash
   php artisan make:model Skill
   php artisan make:model Session
   php artisan make:model Review
   php artisan make:model Message
   php artisan make:model Notification
   ```

3. ✅ **إنشاء Seeders:**
   ```bash
   php artisan make:seeder SkillsSeeder
   php artisan make:seeder UsersSeeder
   ```

---

### المرحلة 2: Controllers Implementation (أولوية عالية) 🔴

**الوقت المتوقع:** 4-5 ساعات

#### 1. SkillController
```php
// المطلوب:
- index(): عرض جميع المهارات (Browse Skills Page)
- show($id): عرض مهارة محددة
- search(Request $request): البحث في المهارات
```

#### 2. SessionController
```php
// المطلوب:
- index(): عرض جلسات المستخدم
- create($userId): صفحة حجز جلسة
- store(Request $request): حفظ حجز جديد
- show($id): عرض تفاصيل جلسة
- update(Request $request, $id): تحديث جلسة
- destroy($id): إلغاء جلسة
```

#### 3. ReviewController
```php
// المطلوب:
- create($sessionId): صفحة كتابة تقييم
- store(Request $request): حفظ تقييم جديد
- update(Request $request, $id): تحديث تقييم
- destroy($id): حذف تقييم
```

#### 4. MessageController
```php
// المطلوب:
- index(): عرض المحادثات
- store(Request $request): إرسال رسالة
- show($userId): عرض محادثة مع مستخدم
- markAsRead($conversationId): تعليم كمقروء
```

#### 5. NotificationController
```php
// المطلوب:
- index(): عرض الإشعارات
- markAsRead($id): تعليم إشعار كمقروء
- markAllAsRead(): تعليم الكل كمقروء
- getUnreadCount(): عدد الإشعارات غير المقروءة
```

---

### المرحلة 3: Validation & Business Logic (أولوية متوسطة) 🟡

**الوقت المتوقع:** 3-4 ساعات

1. **Form Requests:**
   ```bash
   php artisan make:request StoreSessionRequest
   php artisan make:request StoreReviewRequest
   php artisan make:request StoreMessageRequest
   ```

2. **Business Rules:**
   - لا يمكن حجز جلسة في الماضي
   - لا يمكن حجز جلستين في نفس الوقت
   - يمكن تقييم الجلسة فقط بعد اكتمالها
   - لا يمكن تقييم نفس الجلسة مرتين

3. **Notifications System:**
   - إشعار عند حجز جلسة جديدة
   - إشعار قبل الجلسة بـ 15 دقيقة
   - إشعار عند استلام رسالة
   - إشعار عند استلام تقييم

---

### المرحلة 4: API Endpoints (اختياري) 🟢

**الوقت المتوقع:** 2-3 ساعات

إذا كنت تريد إضافة API للمستقبل:

```php
Route::prefix('api')->group(function () {
    Route::get('/skills', [SkillController::class, 'apiIndex']);
    Route::get('/sessions', [SessionController::class, 'apiIndex']);
    Route::post('/messages', [MessageController::class, 'apiStore']);
    Route::get('/notifications/unread', [NotificationController::class, 'apiUnreadCount']);
});
```

---

## 🌱 Seeders المطلوبة

### SkillsSeeder
```php
// يجب إضافة 20-30 مهارة على الأقل:

$skills = [
    // Programming
    ['name' => 'Laravel', 'category' => 'برمجة', 'icon' => '💻'],
    ['name' => 'React.js', 'category' => 'برمجة', 'icon' => '⚛️'],
    ['name' => 'Vue.js', 'category' => 'برمجة', 'icon' => '💚'],
    ['name' => 'Python', 'category' => 'برمجة', 'icon' => '🐍'],
    ['name' => 'PHP', 'category' => 'برمجة', 'icon' => '🐘'],
    
    // Design
    ['name' => 'UI/UX Design', 'category' => 'تصميم', 'icon' => '🎨'],
    ['name' => 'Figma', 'category' => 'تصميم', 'icon' => '🎨'],
    ['name' => 'Photoshop', 'category' => 'تصميم', 'icon' => '🖼️'],
    
    // Languages
    ['name' => 'English', 'category' => 'لغات', 'icon' => '🇬🇧'],
    ['name' => 'French', 'category' => 'لغات', 'icon' => '🇫🇷'],
    
    // Business
    ['name' => 'Digital Marketing', 'category' => 'أعمال', 'icon' => '📱'],
    ['name' => 'Project Management', 'category' => 'أعمال', 'icon' => '📊'],
    
    // Add more...
];
```

---

## 🔄 Routes Update المطلوب

تحديث `routes/web.php` لاستخدام Controllers بدلاً من Closures:

```php
// Sessions
Route::get('/sessions', [SessionController::class, 'index'])->name('sessions.index');
Route::get('/sessions/book/{user}', [SessionController::class, 'create'])->name('sessions.book');
Route::post('/sessions', [SessionController::class, 'store'])->name('sessions.store');
Route::get('/sessions/{id}', [SessionController::class, 'show'])->name('sessions.show');
Route::patch('/sessions/{id}', [SessionController::class, 'update'])->name('sessions.update');
Route::delete('/sessions/{id}', [SessionController::class, 'destroy'])->name('sessions.destroy');

// Reviews
Route::get('/reviews/create/{session}', [ReviewController::class, 'create'])->name('reviews.create');
Route::post('/reviews', [ReviewController::class, 'store'])->name('reviews.store');

// Messages
Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
Route::get('/messages/{user}', [MessageController::class, 'show'])->name('messages.show');

// Notifications
Route::get('/notifications', [NotificationController::class, 'index'])->name('notifications.index');
Route::post('/notifications/{id}/read', [NotificationController::class, 'markAsRead'])->name('notifications.read');
Route::post('/notifications/read-all', [NotificationController::class, 'markAllAsRead'])->name('notifications.read-all');
```

---

## 📊 Data Flow Examples

### مثال 1: حجز جلسة

**Frontend → Backend:**
```javascript
// من صفحة sessions/book.blade.php
<form action="{{ route('sessions.store') }}" method="POST">
    @csrf
    <input name="provider_id" value="{{ $userId }}">
    <input name="skill_id" value="...">
    <input name="date" value="2025-11-05">
    <input name="start_time" value="15:00">
    <input name="duration" value="2">
    <input name="type" value="online">
    <textarea name="notes">...</textarea>
</form>
```

**Backend Processing:**
1. Validate data
2. Create session record
3. Send notification to provider
4. Redirect to sessions.index with success message

---

### مثال 2: كتابة تقييم

**Frontend → Backend:**
```javascript
// من صفحة reviews/create.blade.php
<form action="{{ route('reviews.store') }}" method="POST">
    @csrf
    <input name="session_id" value="{{ $sessionId }}">
    <input name="rating" value="5">
    <input name="communication_rating" value="5">
    <input name="knowledge_rating" value="5">
    <input name="patience_rating" value="5">
    <input name="preparation_rating" value="5">
    <textarea name="comment">...</textarea>
    <input type="checkbox" name="would_recommend" value="1">
</form>
```

**Backend Processing:**
1. Validate session is completed
2. Check user hasn't reviewed before
3. Create review record
4. Update provider's average_rating
5. Send notification to provider
6. Redirect to session details

---

## 🎯 Testing Checklist

### Unit Tests
```bash
php artisan make:test SkillTest
php artisan make:test SessionTest
php artisan make:test ReviewTest
php artisan make:test MessageTest
```

### Feature Tests
- ✅ User can browse skills
- ✅ User can book a session
- ✅ User can view session details
- ✅ User can submit a review
- ✅ User can send messages
- ✅ User can view notifications

---

## 🚨 Important Notes

### Security
1. **Authorization:** تأكد من أن المستخدم يمكنه فقط:
   - عرض جلساته الخاصة
   - تقييم الجلسات التي شارك فيها
   - قراءة رسائله فقط

2. **Validation:** تحقق من جميع المدخلات

3. **CSRF Protection:** موجود في Breeze

### Performance
1. **Eager Loading:** استخدم `with()` لتجنب N+1 queries
2. **Pagination:** استخدم pagination للقوائم الطويلة
3. **Caching:** cache للمهارات والبيانات الثابتة

### Real-time (المرحلة المتقدمة)
- استخدم Laravel Echo + Pusher للرسائل الفورية
- WebSocket للإشعارات الفورية

---

## 📞 Contact & Questions

إذا كان لديك أي استفسارات:
1. راجع التوثيق في `DEVELOPER_GUIDE.md`
2. راجع `INTERFACES_CHECKLIST.md` لقائمة الواجهات
3. راجع `FRONTEND_STATUS.md` لحالة المشروع

---

## ✅ Checklist للـ Backend Developer

### Phase 1: Setup (يوم 1)
- [ ] Review جميع الملفات
- [ ] Setup database
- [ ] Create migrations
- [ ] Create models
- [ ] Create seeders
- [ ] Run migrations & seeders

### Phase 2: Core Features (يوم 2-3)
- [ ] Implement SkillController
- [ ] Implement SessionController
- [ ] Implement ReviewController
- [ ] Update routes to use controllers
- [ ] Test all features

### Phase 3: Additional Features (يوم 4)
- [ ] Implement MessageController
- [ ] Implement NotificationController
- [ ] Add validation
- [ ] Add authorization

### Phase 4: Testing & Polish (يوم 5)
- [ ] Write tests
- [ ] Fix bugs
- [ ] Optimize queries
- [ ] Documentation

---

**Good Luck! 🚀**

Frontend جاهز ومنتظر السحر من Backend Developer! 💪
