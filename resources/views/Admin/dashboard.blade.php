<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل ادمین</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.rtl.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Vazirmatn:wght@400;500;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./adminForm.css">
    <style>
        :root {
            --gold: #FFD700;
            --dark: #0F0F0F;
            --darker: #070707;
            --glass: rgba(15, 15, 15, 0.7);
        }
        
        * {
            font-family: 'Vazirmatn', sans-serif;
        }
        
        body {
            background: linear-gradient(135deg, var(--darker), var(--dark));
            color: #EEE;
            min-height: 100vh;
        }
        
        .admin-glass-panel {
            background: var(--glass);
            backdrop-filter: blur(15px);
            border-left: 1px solid rgba(255, 215, 0, 0.2);
            width: 280px;
            height: 100vh;
            position: fixed;
            padding: 25px 0;
            box-shadow: 5px 0 25px rgba(0,0,0,0.3);
            z-index: 1000;
        }
        
        .admin-brand {
            padding: 0 25px 25px;
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
            margin-bottom: 20px;
        }
        
        .admin-brand h2 {
            color: var(--gold);
            font-weight: 500;
            margin: 0;
        }
        
        .admin-menu {
            list-style: none;
            padding: 0;
        }
        
        .admin-menu li {
            margin-bottom: 5px;
        }
        
        .admin-menu li a {
            display: flex;
            align-items: center;
            padding: 12px 25px;
            color: #DDD;
            text-decoration: none;
            transition: all 0.3s;
            position: relative;
            overflow: hidden;
        }
        
        .admin-menu li a::before {
            content: "";
            position: absolute;
            right: -10px;
            top: 0;
            height: 100%;
            width: 3px;
            background: var(--gold);
            transition: all 0.3s;
            opacity: 0;
        }
        
        .admin-menu li a:hover,
        .admin-menu li.active a {
            background: rgba(255, 215, 0, 0.08);
            color: var(--gold);
        }
        
        .admin-menu li a:hover::before,
        .admin-menu li.active a::before {
            right: 0;
            opacity: 1;
        }
        
        .admin-menu li a i {
            margin-left: 10px;
            font-size: 1.1rem;
        }
        
        
        .admin-main-content {
            margin-right: 280px;
            padding: 30px;
        }
        
        
        .category-tabs {
            display: flex;
            gap: 10px;
            margin-bottom: 30px;
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
            padding-bottom: 15px;
            overflow-x: auto;
        }
        
        .category-tab {
            padding: 8px 20px;
            background: transparent;
            border: none;
            color: #AAA;
            border-radius: 6px;
            cursor: pointer;
            transition: all 0.3s;
            position: relative;
            font-weight: 500;
            white-space: nowrap;
        }
        
        .category-tab::after {
            content: "";
            position: absolute;
            bottom: -16px;
            right: 0;
            width: 0;
            height: 2px;
            background: var(--gold);
            transition: all 0.3s;
        }
        
        .category-tab:hover,
        .category-tab.active {
            color: var(--gold);
        }
        
        .category-tab.active::after {
            width: 100%;
        }
        
        
        .product-card {
            background: var(--glass);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 215, 0, 0.1);
            border-radius: 12px;
            padding: 20px;
            margin-bottom: 25px;
            transition: all 0.3s;
        }
        
        .product-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.2);
            border-color: rgba(255, 215, 0, 0.3);
        }
        
        .product-card-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 20px;
            padding-bottom: 15px;
            border-bottom: 1px solid rgba(255, 215, 0, 0.1);
        }
        
        .product-card-header h3 {
            margin: 0;
            color: var(--gold);
        }
        
        
        .gold-btn {
            background: linear-gradient(135deg, var(--gold), #FFC000);
            color: #111;
            border: none;
            padding: 8px 20px;
            border-radius: 6px;
            font-weight: 500;
            cursor: pointer;
            transition: all 0.3s;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .gold-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 215, 0, 0.3);
        }
        
       
        .glass-table {
            width: 100%;
            border-collapse: collapse;
            background: var(--glass);
            backdrop-filter: blur(10px);
            border-radius: 12px;
            overflow: hidden;
        }
        
        .glass-table th {
            background: rgba(255, 215, 0, 0.1);
            color: var(--gold);
            padding: 15px;
            text-align: right;
            font-weight: 500;
        }
        
        .glass-table td {
            padding: 12px 15px;
            border-bottom: 1px solid rgba(255, 215, 0, 0.05);
        }
        
        .glass-table tr:last-child td {
            border-bottom: none;
        }
        
        .glass-table tr:hover {
            background: rgba(255, 215, 0, 0.03);
        }
        
       
        .glass-form {
            background: var(--glass);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 215, 0, 0.1);
            border-radius: 12px;
            padding: 25px;
            margin-top: 30px;
        }
        
        .form-row {
            display: flex;
            gap: 20px;
            margin-bottom: 20px;
        }
        
        .form-group {
            flex: 1;
        }
        
        .form-label {
            display: block;
            margin-bottom: 8px;
            color: var(--gold);
            font-weight: 500;
        }
        
        .form-input {
            width: 100%;
            padding: 12px 15px;
            background: rgba(255, 255, 255, 0.05);
            border: 1px solid rgba(255, 215, 0, 0.2);
            border-radius: 8px;
            color: #EEE;
            transition: all 0.3s;
        }
        
        .form-input:focus {
            outline: none;
            border-color: var(--gold);
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.1);
        }
        
        
        .image-upload {
            border: 2px dashed rgba(255, 215, 0, 0.3);
            border-radius: 12px;
            padding: 30px;
            text-align: center;
            cursor: pointer;
            transition: all 0.3s;
            margin-bottom: 20px;
        }
        
        .image-upload:hover {
            border-color: var(--gold);
            background: rgba(255, 215, 0, 0.05);
        }
        
        .upload-icon {
            font-size: 2.5rem;
            color: var(--gold);
            margin-bottom: 15px;
        }
        
        .image-preview {
            max-width: 200px;
            max-height: 200px;
            border-radius: 8px;
            display: none;
            margin: 0 auto 20px;
            border: 1px solid rgba(255, 215, 0, 0.2);
        }
        
        /* رسپانسیو برای موبایل */
        @media (max-width: 992px) {
            .admin-glass-panel {
                width: 100%;
                height: auto;
                position: relative;
                padding: 15px 0;
            }
            
            .admin-main-content {
                margin-right: 0;
                padding: 20px;
            }
            
            .product-card-header {
                flex-direction: column;
                align-items: flex-start;
                gap: 15px;
            }
            
            .form-row {
                flex-direction: column;
                gap: 15px;
            }
        }
        
        @media (max-width: 768px) {
            .admin-brand h2 {
                font-size: 1.5rem;
            }
            
            .glass-table {
                display: block;
                overflow-x: auto;
            }
            
            .glass-form {
                padding: 15px;
            }
        }
    </style>
</head>
<body>
    <div class="admin-glass-panel">
        <div class="admin-brand">
            <h2> Unique Scarf</h2>
        </div>
        <ul class="admin-menu">
            <li class="active"><a href="#"><i class="fas fa-chart-pie"></i> داشبورد</a></li>
            <li><a href="#"><i class="fas fa-users"></i> مشتریان</a></li>
            <li><a href="#"><i class="fas fa-shopping-cart"></i> سفارشات</a></li>
            <li><a href="#"><i class="fas fa-cog"></i> تنظیمات</a></li>
        </ul>
    </div>

    <div class="admin-main-content">
        <h1 class="mb-4"><i class="fas fa-scarf"></i> مدیریت محصولات</h1>
        
        <div class="category-tabs">
            <button class="category-tab active">همه محصولات</button>
            <button class="category-tab">مقنعه</button>
            <button class="category-tab">شال</button>
            <button class="category-tab">روسری</button>
            <button class="category-tab">مینی اسکارف</button>
        </div>
        
        <div class="product-card">
            <div class="product-card-header">
                <h3><i class="fas fa-list"></i> لیست محصولات</h3>
                <button class="gold-btn" id="showFormBtn">
                    <i class="fas fa-plus"></i> محصول جدید
                </button>
            </div>
            
            <div class="table-responsive">
                <table class="glass-table">
                    <thead>
                        <tr>
                            <th>تصویر</th>
                            <th>نام محصول</th>
                            <th>دسته‌بندی</th>
                            <th>کد محصول</th>
                            <th>قیمت</th>
                            <th>عملیات</th>
                        </tr>
                    </thead>
                    <tbody>
                    @if ($products->isEmpty())
                        <div class="alert alert-info">هنوز هیچ محصولی ثبت نشده است.</div>
                    @else
                        @foreach ($products as $product )
                            <tr>
                            
                            <td><img src={{ asset('storage/' . $product['picture']) }} width="50" class="rounded"></td>
                            <td>{{ $product['name'] }}</td>
                            <td><span class="badge bg-warning text-dark">{{ $product['type'] }}</span></td>
                            <td>{{ $product['id'] }}</td>
                            <td>{{ $product['price'] }} تومان</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <a href="{{ route('product.edit',$product['id']) }}" class="gold-btn" style="padding: 5px 10px; font-size: 0.9rem;">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href="{{ route('product.destroy',$product['id']) }}" class="btn btn-sm" style="background: rgba(220, 53, 69, 0.2); color: #DC3545;">
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                            <!-- <td><img src="./images/شال.webp" width="50" class="rounded"></td>
                            <td>شال حریر</td>
                            <td><span class="badge bg-warning text-dark">شال</span></td>
                            <td>rr-111</td>
                            <td>290,000 تومان</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="gold-btn" style="padding: 5px 10px; font-size: 0.9rem;">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm" style="background: rgba(220, 53, 69, 0.2); color: #DC3545;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td> -->
                            </tr>
                        @endforeach
                    @endif
                        <!-- <tr>
                            <td><img src="./images/روسری.webp" width="50" class="rounded"></td>
                            <td>روسری زمستانی</td>
                            <td><span class="badge bg-success">روسری</span></td>
                            <td>rr-1111</td>
                            <td>450,000 تومان</td>
                            <td>
                                <div class="d-flex gap-2">
                                    <button class="gold-btn" style="padding: 5px 10px; font-size: 0.9rem;">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button class="btn btn-sm" style="background: rgba(220, 53, 69, 0.2); color: #DC3545;">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </td>
                        </tr> -->
                    </tbody>
                </table>
            </div>
        </div>
        
        <!-- فرم افزودن محصول -->
        <form action="{{ route('product.create') }}" id="productForm" style="display: none;" method="POST" enctype="multipart/form-data" class="p-4 border rounded shadow-sm">
            @csrf
            <div class="glass-form">
                <h3 class="mb-4"><i class="fas fa-plus-circle"></i> افزودن محصول جدید</h3>
                
                <div class="image-upload" id="uploadContainer">
                    <div class="upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <p>برای آپلود تصویر کلیک کنید یا فایل را اینجا رها کنید</p>
                    <input type="file" id="productImage" id="picture" name="picture" accept="image/*" required  style="display: none;">
                    <img id="imagePreview" class="image-preview">
                </div>
                
                <div class="row g-3 mb-3">
                    <div class="col-md-6">
                        <label class="form-label">نام محصول</label>
                        <input type="text" class="form-input" name="name" id="name" placeholder="مثال: شال حریر طرح دار" required>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">دسته‌بندی</label>
                        <select class="form-input bg-dark" name="type" id="type" required>
                            <option value="">انتخاب کنید</option>
                            <option value="مقنعه">مقنعه</option>
                            <option value="شال">شال</option>
                            <option value="روسری">روسری</option>
                            <option value="مینی اسکارف">مینی اسکارف</option>
                        </select>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">تعداد محصول</label>
                        <input type="text" class="form-input" name="number" id="number" placeholder="مثال: 20" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">سایز</label>
                        <input type="text" class="form-input" name="size" id="size" placeholder="مثال: 60*60 سانتی‌متر" required>
                    </div>
                    <div class="col-md-4">
                        <label class="form-label">قیمت (تومان)</label>
                        <input type="text" class="form-input" name="price" id="price" placeholder="مثال: 290000" required>
                    </div>
                    
                </div>
            </div>
            <div class="col-12">
                <button type="submit" class="gold-btn" style="padding: 12px 25px;">
                            <i class="fas fa-save"></i> ذخیره محصول
                </button>
            </div>
        </form>    
    </div>

    
    <script>
        // نمایش/پنهان کردن فرم
        document.getElementById('showFormBtn').addEventListener('click', function() {
            const form = document.getElementById('productForm');
            form.style.display = form.style.display === 'none' ? 'block' : 'none';
            resetForm(); // فرم را ریست می‌کنیم
        });
        
        // تغییر تب‌های دسته‌بندی و فیلتر محصولات
        const tabs = document.querySelectorAll('.category-tab');
        tabs.forEach(tab => {
            tab.addEventListener('click', function() {
                tabs.forEach(t => t.classList.remove('active'));
                this.classList.add('active');
                filterProducts(this.textContent.trim());
            });
        });
        
        // فیلتر کردن محصولات بر اساس دسته‌بندی
        function filterProducts(category) {
            const rows = document.querySelectorAll('.glass-table tbody tr');
            rows.forEach(row => {
                const rowCategory = row.querySelector('td:nth-child(3)').textContent.trim();
                if (category === 'همه محصولات' || rowCategory === category) {
                    row.style.display = '';
                } else {
                    row.style.display = 'none';
                }
            });
        }
        
        // آپلود تصویر )
        const uploadContainer = document.getElementById('uploadContainer');
        const fileInput = document.getElementById('productImage');
        const imagePreview = document.getElementById('imagePreview');
        
        uploadContainer.addEventListener('click', () => fileInput.click());
        
        fileInput.addEventListener('change', function() {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    imagePreview.src = e.target.result;
                    imagePreview.style.display = 'block';
                    uploadContainer.style.padding = '20px';
                }
                reader.readAsDataURL(file);
            }
        });
        
        // Drag and Drop برای آپلود )
        uploadContainer.addEventListener('dragover', (e) => {
            e.preventDefault();
            uploadContainer.style.borderColor = 'var(--gold)';
            uploadContainer.style.background = 'rgba(255, 215, 0, 0.1)';
        });
        
        uploadContainer.addEventListener('dragleave', () => {
            uploadContainer.style.borderColor = 'rgba(255, 215, 0, 0.3)';
            uploadContainer.style.background = 'transparent';
        });
        
        uploadContainer.addEventListener('drop', (e) => {
            e.preventDefault();
            uploadContainer.style.borderColor = 'rgba(255, 215, 0, 0.3)';
            uploadContainer.style.background = 'transparent';
            
            const file = e.dataTransfer.files[0];
            if (file && file.type.match('image.*')) {
                fileInput.files = e.dataTransfer.files;
                const event = new Event('change');
                fileInput.dispatchEvent(event);
            }
        });
        
        // ذخیره محصول جدید
        document.querySelector('.glass-form button[type="submit"]').addEventListener('click', function(e) {
            e.preventDefault();
            addNewProduct();
        });
        
        // اضافه کردن محصول جدید به جدول
        function addNewProduct() {
            const name = document.getElementById('name').value;
            const type = document.getElementById('type').value;
            const code = document.getElementById('code').value;
            const price = document.getElementById('price').value;
            const imageSrc = imagePreview.src || './images/default-product.webp';
            
            if (!name || !type || !code || !price) {
                alert('لطفا تمام فیلدهای ضروری را پر کنید');
                return;
            }
            
            const tbody = document.querySelector('.glass-table tbody');
            const newRow = document.createElement('tr');
            
            // تعیین رنگ badge بر اساس دسته‌بندی
            let badgeClass = 'bg-secondary';
            if (type === 'مقنعه') badgeClass = 'bg-primary';
            else if (type === 'شال') badgeClass = 'bg-warning text-dark';
            else if (type === 'روسری') badgeClass = 'bg-success';
            else if (type === 'مینی اسکارف') badgeClass = 'bg-info text-dark';
            
            newRow.innerHTML = `
                <td><img src="${imageSrc}" width="50" class="rounded"></td>
                <td>${name}</td>
                <td><span class="badge ${badgeClass}">${type}</span></td>
                <td>${code}</td>
                <td>${Number(price).toLocaleString('fa-IR')} تومان</td>
                <td>
                    <div class="d-flex gap-2">
                        <button class="gold-btn edit-btn" style="padding: 5px 10px; font-size: 0.9rem;">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button class="btn btn-sm delete-btn" style="background: rgba(220, 53, 69, 0.2); color: #DC3545;">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </td>
            `;
            
            tbody.appendChild(newRow);
            
            // اضافه کردن event listener برای دکمه‌های جدید
            newRow.querySelector('.edit-btn').addEventListener('click', function() {
                editProduct(newRow);
            });
            
            newRow.querySelector('.delete-btn').addEventListener('click', function() {
                deleteProduct(newRow);
            });
            
            // پنهان کردن فرم و ریست کردن آن
            document.getElementById('productForm').style.display = 'none';
            resetForm();
        }
        
        // ریست کردن فرم
        function resetForm() {
            document.getElementById('name').value = '';
            document.getElementById('type').value = '';
            document.getElementById('code').value = '';
            document.getElementById('size').value = '';
            document.getElementById('price').value = '';
            document.getElementById('explain').value = '';
            imagePreview.src = '';
            imagePreview.style.display = 'none';
            uploadContainer.style.padding = '30px';
            fileInput.value = '';
        }
        
        // ویرایش محصول
        function editProduct(row) {
            const cells = row.cells;
            document.getElementById('name').value = cells[1].textContent;
            document.getElementById('type').value = cells[2].textContent.trim();
            document.getElementById('code').value = cells[3].textContent;
            document.getElementById('price').value = cells[4].textContent.replace(/[^0-9]/g, '');
            
            // نمایش فرم
            document.getElementById('productForm').style.display = 'block';
            document.querySelector('.glass-form h3').innerHTML = '<i class="fas fa-edit"></i> ویرایش محصول';
            
            // تغییر رفتار دکمه ذخیره به ویرایش
            const submitBtn = document.querySelector('.glass-form button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-save"></i> ذخیره تغییرات';
            submitBtn.onclick = function(e) {
                e.preventDefault();
                saveEditedProduct(row);
            };
        }
        
        // ذخیره تغییرات محصول ویرایش شده
        function saveEditedProduct(row) {
            const cells = row.cells;
            cells[1].textContent = document.getElementById('name').value;
            cells[2].innerHTML = `<span class="badge ${getBadgeClass(document.getElementById('type').value)}">${document.getElementById('type').value}</span>`;
            cells[3].textContent = document.getElementById('code').value;
            cells[4].textContent = `${Number(document.getElementById('price').value).toLocaleString('fa-IR')} تومان`;
            
            if (imagePreview.src && imagePreview.style.display !== 'none') {
                cells[0].innerHTML = `<img src="${imagePreview.src}" width="50" class="rounded">`;
            }
            
            // پنهان کردن فرم و ریست کردن آن
            document.getElementById('productForm').style.display = 'none';
            resetForm();
            
            // بازگرداندن دکمه به حالت اولیه
            const submitBtn = document.querySelector('.glass-form button[type="submit"]');
            submitBtn.innerHTML = '<i class="fas fa-save"></i> ذخیره محصول';
            submitBtn.onclick = function(e) {
                e.preventDefault();
                addNewProduct();
            };
        }
        
        // حذف محصول
        function deleteProduct(row) {
            if (confirm('آیا از حذف این محصول مطمئن هستید؟')) {
                row.remove();
            }
        }
        
        // تعیین کلاس badge بر اساس نوع محصول
        function getBadgeClass(type) {
            if (type === 'مقنعه') return 'bg-primary';
            if (type === 'شال') return 'bg-warning text-dark';
            if (type === 'روسری') return 'bg-success';
            if (type === 'مینی اسکارف') return 'bg-info text-dark';
            return 'bg-secondary';
        }
        
        // اضافه کردن event listener برای دکمه‌های ویرایش و حذف موجود
        document.querySelectorAll('.edit-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                editProduct(this.closest('tr'));
            });
        });
        
        document.querySelectorAll('.delete-btn').forEach(btn => {
            btn.addEventListener('click', function() {
                deleteProduct(this.closest('tr'));
            });
        });
    </script>
</body>
</html>
