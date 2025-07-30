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
