let isSidebarCollapsed = false;
        let isToolbarActive = false;
        let isDarkMode = false;

        function toggleSidebar() {
            const sidebar = document.querySelector('.sidebar');
            const navbar = document.querySelector('.navbar');
            isSidebarCollapsed = !isSidebarCollapsed;
            sidebar.classList.toggle('collapsed');
            if (isSidebarCollapsed) {
                navbar.style.left = '60px';
                navbar.style.width = 'calc(100% - 60px)';
                document.querySelectorAll('.sidebar ul a span').forEach(item => {
                    item.style.display = 'none';
                });
            } else {
                navbar.style.left = '200px';
                navbar.style.width = 'calc(100% - 200px)';
                document.querySelectorAll('.sidebar ul a span').forEach(item => {
                    item.style.display = 'inline';
                });
            }
        }

        function toggleToolbar() {
            const toolbar = document.getElementById('customize-toolbar');
            isToolbarActive = !isToolbarActive;
            toolbar.classList.toggle('active');
        }

        function closeToolbar() {
            const toolbar = document.getElementById('customize-toolbar');
            isToolbarActive = false;
            toolbar.classList.remove('active');
        }

        function saveSettings() {
            alert('บันทึกค่าล่าสุด');
            toggleToolbar();
        }

        function cancelSettings() {
            alert('กลับไปหน้าเดิม');
            closeToolbar();
        }

        function resetSettings() {
            alert('กลับไปค่า default');
        }

        function checkScreenSize() {
            if (window.innerWidth <= 768 && !isSidebarCollapsed) {
                toggleSidebar();
            } else if (window.innerWidth > 768 && isSidebarCollapsed) {
                toggleSidebar();
            }
        }

        document.querySelectorAll('.sidebar ul a').forEach(item => {
            item.addEventListener('click', event => {
                if (isSidebarCollapsed) {
                    event.preventDefault();
                    toggleSidebar();
                }
            });
        });
        
        window.addEventListener('resize', checkScreenSize);
        document.addEventListener('DOMContentLoaded', checkScreenSize);

        document.getElementById('dark-mode-toggle').addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.add('dark-mode');
                isDarkMode = true;
                document.getElementById('light-mode-toggle').checked = false;
            } else {
                document.body.classList.remove('dark-mode');
                isDarkMode = false;
                document.getElementById('light-mode-toggle').checked = true;
            }
        });

        document.getElementById('light-mode-toggle').addEventListener('change', function() {
            if (this.checked) {
                document.body.classList.remove('dark-mode');
                isDarkMode = false;
                document.getElementById('dark-mode-toggle').checked = false;
            } else {
                document.body.classList.add('dark-mode');
                isDarkMode = true;
                document.getElementById('dark-mode-toggle').checked = true;
            }
        });
        