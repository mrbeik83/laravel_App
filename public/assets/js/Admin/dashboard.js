
        document.addEventListener('DOMContentLoaded', function () {
            // ==================== مدیریت رنگ‌های محصول ====================
            const colorPicker = document.getElementById('colorPicker');
            const addColorBtn = document.getElementById('addColorBtn');
            const colorOptionsContainer = document.querySelector('.color-options-container');
            const availableColorsInput = document.getElementById('availableColorsInput');
            let selectedColors = [];

            // افزودن رنگ جدید
            addColorBtn.addEventListener('click', function () {
                const color = colorPicker.value;

                if (!selectedColors.includes(color)) {
                    selectedColors.push(color);
                    updateColorOptions();
                } else {
                    alert('این رنگ قبلا اضافه شده است!');
                }
            });

            // حذف رنگ
            colorOptionsContainer.addEventListener('click', function (e) {
                if (e.target.classList.contains('remove-color')) {
                    const colorToRemove = e.target.dataset.color;
                    selectedColors = selectedColors.filter(c => c !== colorToRemove);
                    updateColorOptions();
                }
            });

            // به‌روزرسانی نمایش رنگ‌ها و فیلد مخفی
            function updateColorOptions() {
                colorOptionsContainer.innerHTML = '';
                selectedColors.forEach(color => {
                    const colorElement = document.createElement('div');
                    colorElement.className = 'color-option-admin d-flex align-items-center';
                    colorElement.innerHTML = `
                <div class="color-preview me-2" style="background-color: ${color}; width: 20px; height: 20px; border: 1px solid #ddd;"></div>
                <span class="color-value small me-2">${color}</span>
                <button type="button" class="btn btn-sm btn-danger remove-color" data-color="${color}">
                    <i class="fas fa-times"></i>
                </button>
            `;
                    colorOptionsContainer.appendChild(colorElement);
                });

                // ذخیره رنگ‌ها در فیلد مخفی به صورت JSON
                availableColorsInput.value = JSON.stringify(selectedColors);
            }

            // بارگذاری رنگ‌های موجود در صورت ویرایش محصول
            if (availableColorsInput.value) {
                try {
                    selectedColors = JSON.parse(availableColorsInput.value);
                    updateColorOptions();
                } catch (e) {
                    console.error('Error parsing colors:', e);
                }
            }

            // ==================== منوی مدیریت ====================
            const mobileMenuBtn = document.getElementById('mobileMenuBtn');
            const adminSidebar = document.getElementById('adminSidebar');

            mobileMenuBtn.addEventListener('click', function () {
                adminSidebar.classList.toggle('active');
                document.body.classList.toggle('menu-open');
            });

            // تغییر بین بخش‌های مختلف
            const menuItems = document.querySelectorAll('.admin-menu li a');
            const sections = document.querySelectorAll('.admin-main > div');

            menuItems.forEach(item => {
                item.addEventListener('click', function (e) {
                    e.preventDefault();

                    // حذف کلاس active از همه آیتم‌های منو
                    menuItems.forEach(menuItem => {
                        menuItem.parentElement.classList.remove('active');
                    });

                    // اضافه کردن کلاس active به آیتم انتخاب شده
                    this.parentElement.classList.add('active');

                    // پنهان کردن همه بخش‌ها
                    sections.forEach(section => {
                        section.style.display = 'none';
                    });

                    // نمایش بخش مربوطه
                    const target = this.getAttribute('data-target');
                    document.getElementById(target).style.display = 'block';
                });
            });

            // ==================== مدیریت فرم محصول ====================
            const showFormBtn = document.getElementById('showFormBtn');
            const cancelFormBtn = document.getElementById('cancelFormBtn');
            const productForm = document.getElementById('productForm');

            if (showFormBtn && productForm) {
                showFormBtn.addEventListener('click', function () {
                    productForm.style.display = 'block';
                    productForm.scrollIntoView({ behavior: 'smooth' });
                });

                cancelFormBtn.addEventListener('click', function () {
                    productForm.style.display = 'none';
                    resetForm();
                });
            }

            // آپلود تصویر محصول
            const uploadContainer = document.getElementById('uploadContainer');
            const fileInput = document.getElementById('productImage');
            const imagePreview = document.getElementById('imagePreview');

            if (uploadContainer && fileInput && imagePreview) {
                uploadContainer.addEventListener('click', () => fileInput.click());

                fileInput.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file) {
                        if (!file.type.match('image.*')) {
                            alert('لطفاً یک فایل تصویری انتخاب کنید');
                            return;
                        }

                        const reader = new FileReader();
                        reader.onload = function (e) {
                            imagePreview.src = e.target.result;
                            imagePreview.style.display = 'block';
                            uploadContainer.style.padding = '10px';
                            uploadContainer.querySelector('p').style.display = 'none';
                            uploadContainer.querySelector('.upload-icon').style.display = 'none';
                        }
                        reader.readAsDataURL(file);
                    }
                });

                // Drag and Drop برای آپلود
                uploadContainer.addEventListener('dragover', (e) => {
                    e.preventDefault();
                    uploadContainer.style.borderColor = 'var(--gold-color)';
                    uploadContainer.style.background = 'rgba(210, 180, 140, 0.1)';
                });

                uploadContainer.addEventListener('dragleave', () => {
                    uploadContainer.style.borderColor = 'rgba(92, 58, 33, 0.3)';
                    uploadContainer.style.background = 'transparent';
                });

                uploadContainer.addEventListener('drop', (e) => {
                    e.preventDefault();
                    uploadContainer.style.borderColor = 'rgba(92, 58, 33, 0.3)';
                    uploadContainer.style.background = 'transparent';

                    const file = e.dataTransfer.files[0];
                    if (file && file.type.match('image.*')) {
                        fileInput.files = e.dataTransfer.files;
                        const event = new Event('change');
                        fileInput.dispatchEvent(event);
                    } else {
                        alert('لطفاً یک فایل تصویری انتخاب کنید');
                    }
                });
            }

            // دکمه خروج
            const logoutBtn = document.getElementById('logoutBtn');
            if (logoutBtn) {
                logoutBtn.addEventListener('click', function () {
                    if (confirm('آیا از خروج از حساب کاربری مطمئن هستید؟')) {
                        alert('شما با موفقیت از حساب کاربری خارج شدید.');
                        // window.location.href = 'login.html';
                    }
                });
            }

            // ریست کردن فرم
            function resetForm() {
                if (document.getElementById('productName')) {
                    document.getElementById('productName').value = '';
                    document.getElementById('productCategory').value = '';
                    document.getElementById('productCode').value = '';
                    document.getElementById('productPrice').value = '';
                    document.getElementById('productStock').value = '';
                    document.getElementById('productSize').value = '';
                    document.getElementById('productStatus').value = 'موجود';
                    document.getElementById('productDescription').value = '';

                    // ریست کردن رنگ‌ها
                    selectedColors = [];
                    updateColorOptions();

                    if (imagePreview) {
                        imagePreview.src = '';
                        imagePreview.style.display = 'none';
                    }

                    if (uploadContainer) {
                        uploadContainer.style.padding = '20px';
                        uploadContainer.querySelector('p').style.display = 'block';
                        uploadContainer.querySelector('.upload-icon').style.display = 'block';
                    }

                    if (fileInput) {
                        fileInput.value = '';
                    }

                    // بازگرداندن دکمه به حالت اولیه
                    const submitBtn = document.querySelector('#productForm button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.innerHTML = '<i class="fas fa-save"></i> ذخیره محصول';
                        submitBtn.onclick = function (e) {
                            e.preventDefault();
                            addNewProduct();
                        };
                    }
                }
            }

            // ذخیره محصول جدید
            // const saveProductBtn = document.querySelector('#productForm button[type="submit"]');
            // if (saveProductBtn) {
            //     saveProductBtn.addEventListener('click', function (e) {
            //         e.preventDefault();
            //         addNewProduct();
            //     });
            // }

            // اضافه کردن محصول جدید به جدول
            function addNewProduct() {
                // const name = document.getElementById('productName').value;
                // const category = document.getElementById('productCategory').value;
                // const code = document.getElementById('productCode').value;
                // const price = document.getElementById('productPrice').value;
                // const stock = document.getElementById('productStock').value;
                // const status = document.getElementById('productStatus').value;
                // const imageSrc = imagePreview ? imagePreview.src : './images/default-product.webp';
                // const colors = JSON.parse(availableColorsInput.value || '[]');

                // if (!name || !category || !code || !price || !stock) {
                //     alert('لطفا تمام فیلدهای ضروری را پر کنید');
                //     return;
                // }

                // const tbody = document.querySelector('.admin-table tbody');
                // const newRow = document.createElement('tr');

                // تعیین رنگ badge بر اساس دسته‌بندی
        //         let badgeClass = getBadgeClass(category);



        //         newRow.innerHTML = `
        //     <td><img src="${imageSrc}" width="40" class="rounded"></td>
        //     <td>${name}</td>
        //     <td><span class="badge ${badgeClass}">${category}</span></td>
        //     <td>${code}</td>
        //     <td>${Number(price).toLocaleString('fa-IR')} تومان</td>
        //     <td>${stock} عدد</td>
            
        //     <td>
        //         <div class="d-flex gap-2">
        //             <button class="gold-btn edit-btn" style="padding: 4px 8px; font-size: 0.8rem;">
        //                 <i class="fas fa-edit"></i>
        //             </button>
        //             <button class="btn btn-sm delete-btn" style="background: rgba(220, 53, 69, 0.1); color: #DC3545;">
        //                 <i class="fas fa-trash"></i>
        //             </button>
        //         </div>
        //     </td>
        // `;

                // tbody.insertBefore(newRow, tbody.firstChild);

                // اضافه کردن event listener برای دکمه‌های جدید
                // newRow.querySelector('.edit-btn').addEventListener('click', function () {
                //     editProduct(newRow);
                // });

                // newRow.querySelector('.delete-btn').addEventListener('click', function () {
                //     deleteProduct(newRow);
                // });

                // پنهان کردن فرم و ریست کردن آن
                if (productForm) {
                    productForm.style.display = 'none';
                }
                resetForm();

                // نمایش پیام موفقیت
                alert('محصول با موفقیت اضافه شد.');

                // فیلتر کردن خودکار بر اساس دسته‌بندی محصول جدید
                filterProducts(category);
            }

            // ویرایش محصول
            function editProduct(row) {
                const cells = row.cells;
                document.getElementById('productName').value = cells[1].textContent;
                document.getElementById('productCategory').value = cells[2].textContent.trim();
                document.getElementById('productCode').value = cells[3].textContent;
                document.getElementById('productPrice').value = cells[4].textContent.replace(/[^0-9]/g, '');
                document.getElementById('productStock').value = cells[5].textContent.replace(/[^0-9]/g, '');

                // بارگذاری رنگ‌های موجود
                const colorElements = row.cells[6].querySelectorAll('.product-color');
                selectedColors = Array.from(colorElements).map(el => el.style.backgroundColor);
                updateColorOptions();

                // نمایش فرم
                document.getElementById('productForm').style.display = 'block';
                document.querySelector('#productForm .card-title').innerHTML = '<i class="fas fa-edit"></i> ویرایش محصول';

                // تغییر رفتار دکمه ذخیره به ویرایش
                const submitBtn = document.querySelector('#productForm button[type="submit"]');
                submitBtn.innerHTML = '<i class="fas fa-save"></i> ذخیره تغییرات';
                submitBtn.onclick = function (e) {
                    e.preventDefault();
                    saveEditedProduct(row);
                };

                // اسکرول به فرم
                productForm.scrollIntoView({ behavior: 'smooth' });
            }

            // ذخیره تغییرات محصول ویرایش شده
            function saveEditedProduct(row) {
                const cells = row.cells;
                const oldCategory = cells[2].textContent.trim();
                const newCategory = document.getElementById('productCategory').value;

                cells[1].textContent = document.getElementById('productName').value;
                cells[2].innerHTML = `<span class="badge ${getBadgeClass(newCategory)}">${newCategory}</span>`;
                cells[3].textContent = document.getElementById('productCode').value;
                cells[4].textContent = `${Number(document.getElementById('productPrice').value).toLocaleString('fa-IR')} تومان`;
                cells[5].textContent = `${document.getElementById('productStock').value} عدد`;

                // به‌روزرسانی رنگ‌ها
                let colorsHTML = '<div class="product-colors">';
                if (selectedColors.length > 0) {
                    selectedColors.forEach(color => {
                        colorsHTML += `<div class="product-color" style="background-color: ${color}" title="${color}"></div>`;
                    });
                } else {
                    colorsHTML += '<span class="text-muted small">بدون رنگ</span>';
                }
                colorsHTML += '</div>';
                cells[6].innerHTML = colorsHTML;

                if (imagePreview && imagePreview.style.display !== 'none') {
                    cells[0].innerHTML = `<img src="${imagePreview.src}" width="40" class="rounded">`;
                }

                // پنهان کردن فرم و ریست کردن آن
                document.getElementById('productForm').style.display = 'none';
                resetForm();

                // اگر دسته‌بندی تغییر کرده باشد، فیلتر را اعمال کن
                if (oldCategory !== newCategory) {
                    const activeTab = document.querySelector('.nav-tabs .nav-link.active').textContent.trim();
                    if (activeTab !== 'همه محصولات') {
                        filterProducts(activeTab);
                    }
                }
            }

            // حذف محصول
            function deleteProduct(row) {
                if (confirm('آیا از حذف این محصول مطمئن هستید؟')) {
                    row.remove();
                }
            }

            // تعیین کلاس badge بر اساس نوع محصول
            function getBadgeClass(type) {
                if (type === 'مقنعه') return 'badge-primary';
                if (type === 'شال') return 'badge-warning';
                if (type === 'روسری') return 'badge-success';
                if (type === 'مینی اسکارف') return 'badge-info';
                return 'badge-secondary';
            }

            // تغییر تب‌های دسته‌بندی و فیلتر محصولات
            const navLinks = document.querySelectorAll('.nav-tabs .nav-link');
            navLinks.forEach(link => {
                link.addEventListener('click', function (e) {
                    e.preventDefault();
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');

                    const category = this.textContent.trim();
                    filterProducts(category);
                });
            });

            // فیلتر کردن محصولات بر اساس دسته‌بندی
            function filterProducts(category) {
                const rows = document.querySelectorAll('.admin-table tbody tr');

                rows.forEach(row => {
                    const rowCategory = row.querySelector('td:nth-child(3)').textContent.trim();

                    if (category === 'همه محصولات' || rowCategory === category) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });
            }

            // آپلود تصویر پروفایل
            const avatarUpload = document.getElementById('avatarUpload');
            const userAvatar = document.getElementById('userAvatar');

            if (avatarUpload && userAvatar) {
                document.querySelector('.account-section .image-upload').addEventListener('click', () => avatarUpload.click());

                avatarUpload.addEventListener('change', function () {
                    const file = this.files[0];
                    if (file) {
                        if (!file.type.match('image.*')) {
                            alert('لطفاً یک فایل تصویری انتخاب کنید');
                            return;
                        }

                        const reader = new FileReader();
                        reader.onload = function (e) {
                            userAvatar.src = e.target.result;
                        }
                        reader.readAsDataURL(file);
                    }
                });
            }

            // ==================== بخش مشتریان ====================
            function setupCustomerSection() {
                // مخفی کردن دکمه اضافه کردن مشتری
                const addCustomerBtn = document.querySelector('#customers .gold-btn');
                if (addCustomerBtn) addCustomerBtn.style.display = 'none';

                // مخفی کردن دکمه‌های عملیات
                document.querySelectorAll('#customers .customer-actions button').forEach(btn => {
                    btn.style.display = 'none';
                });

                // فیلتر و جستجوی مشتریان
                const customerSearch = document.querySelector('#customers input[type="text"]');
                const cityFilter = document.querySelector('#customers select:nth-of-type(1)');
                const statusFilter = document.querySelector('#customers select:nth-of-type(2)');
                const filterBtn = document.querySelector('#customers .gold-btn');

                if (customerSearch && cityFilter && statusFilter) {
                    // اضافه کردن event listeners
                    customerSearch.addEventListener('input', filterCustomers);
                    cityFilter.addEventListener('change', filterCustomers);
                    statusFilter.addEventListener('change', filterCustomers);
                    if (filterBtn) filterBtn.addEventListener('click', filterCustomers);

                    function filterCustomers() {
                        const searchValue = customerSearch.value.toLowerCase();
                        const cityValue = cityFilter.value;
                        const statusValue = statusFilter.value;

                        document.querySelectorAll('#customers .admin-table tbody tr').forEach(row => {
                            const name = row.querySelector('td:nth-child(2)').textContent.toLowerCase();
                            const email = row.querySelector('td:nth-child(3)').textContent.toLowerCase();
                            const city = row.querySelector('td:nth-child(4)').textContent;
                            const status = row.querySelector('td:nth-child(6)').textContent;

                            const matchesSearch = name.includes(searchValue) || email.includes(searchValue);
                            const matchesCity = cityValue === '' || city === cityValue;
                            const matchesStatus = statusValue === '' || status === statusValue;

                            row.style.display = (matchesSearch && matchesCity && matchesStatus) ? '' : 'none';
                        });
                    }
                }
            }

            // اجرای فیلتر اولیه برای نمایش همه محصولات
            filterProducts('همه محصولات');
            setupCustomerSection();
        });

        // مدیریت اسلایدر
        document.getElementById('addSlideBtn').addEventListener('click', function () {
            document.getElementById('slideForm').style.display = 'block';
            document.getElementById('slideForm').scrollIntoView({ behavior: 'smooth' });
        });

        document.getElementById('cancelSlideBtn').addEventListener('click', function () {
            document.getElementById('slideForm').style.display = 'none';
        });

        // مدیریت تخفیف‌ها
        document.getElementById('addDiscountBtn').addEventListener('click', function () {
            document.getElementById('discountForm').style.display = 'block';
            document.getElementById('discountForm').scrollIntoView({ behavior: 'smooth' });
        });

        document.getElementById('cancelDiscountBtn').addEventListener('click', function () {
            document.getElementById('discountForm').style.display = 'none';
        });

        // تایمر تخفیف‌ها
        function updateDiscountTimers() {
            document.querySelectorAll('.discount-timer').forEach(timer => {
                const endTime = new Date(timer.dataset.end).getTime();
                const now = new Date().getTime();
                const distance = endTime - now;

                if (distance < 0) {
                    timer.textContent = "منقضی شده";
                    timer.style.color = "#dc3545";
                    return;
                }

                const days = Math.floor(distance / (1000 * 60 * 60 * 24));
                const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));

                timer.textContent = `${days} روز و ${hours} ساعت`;
            });
        }

        // بروزرسانی تایمر هر ثانیه
        setInterval(updateDiscountTimers, 1000);
        updateDiscountTimers();