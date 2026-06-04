/* ========================================
   翠園高中 - CSS 文件使用指南
   ======================================== */

本项目使用模块化CSS结构，所有CSS文件位于 /school/css/ 目录下。

## CSS 文件结构

### 1. global.css (全局基础样式)
   - 功能：全局通用样式、CSS变量定义、按钮样式、链接样式
   - 使用：所有页面都必须引入
   - 包含内容：
     * CSS 变量定义（颜色、阴影、过渡等）
     * 通用按钮样式（.btn-login, .btn-register, .btn-primary, .btn-edit, .btn-delete, .btn-submit, .btn-reset）
     * 标题和链接样式

### 2. navbar.css (导航栏样式)
   - 功能：顶部导航栏、导航链接、响应式导航
   - 使用：所有包含导航栏的页面
   - 包含的 class：
     * .navbar - 导航栏容器
     * .nav-container - 导航栏内容容器
     * .nav-logo - 标志/logo
     * .nav-links - 导航链接列表
     * .nav-buttons - 导航按钮组

### 3. main-layout.css (主页布局)
   - 功能：首页和主页面的布局、卡片、新闻区域、页脚
   - 使用：index.php, admin.php
   - 包含的 class：
     * .hero-section - 英雄区域
     * .hero-content - 英雄内容
     * .hero-button - 英雄按钮
     * .main-content - 主内容区域
     * .section-title - 区域标题
     * .cards-container - 卡片容器
     * .card - 单个卡片
     * .card-icon - 卡片图标
     * .news-section - 新闻区域
     * .news-item - 新闻项目
     * .news-title - 新闻标题
     * .news-date - 新闻日期
     * .footer - 页脚
     * .footer-content - 页脚内容
     * .footer-links - 页脚链接

### 4. admin-layout.css (后台管理布局)
   - 功能：后台管理页面的特殊布局
   - 使用：admin.php (后台管理主页)
   - 包含的 class：
     * .main-content - 主内容区域 (宽度75%)

### 5. form.css (表单样式)
   - 功能：所有表单相关样式、输入框、按钮、消息提示
   - 使用：所有包含表单的页面
   - 包含的 class：
     * .container - 表单容器
     * .form-header - 表单标题
     * .form-group - 表单组
     * .form-actions - 表单操作按钮区域
     * .success-message - 成功消息
     * .fail-message - 失败消息
     * .form-footer - 表单页脚
     * .info-text - 信息文本

### 6. table.css (表格样式)
   - 功能：所有表格、新闻列表、科目表
   - 使用：include/news.php, include/subjects.php等表格页面
   - 包含的 class：
     * .news-container - 新闻容器
     * .news-header - 新闻头
     * .btn-add-news - 新增按钮
     * .news-table - 新闻表格
     * .news-id - 新闻ID
     * .news-subject - 新闻标题
     * .news-preview - 新闻预览
     * .news-date - 新闻日期
     * .action-buttons - 操作按钮组
     * .btn-edit, .btn-delete - 编辑/删除按钮
     * .empty-state - 空状态

### 7. card.css (卡片组件)
   - 功能：学生卡片、卡片列表、响应式卡片布局
   - 使用：include/students.php, include/class_students.php等卡片页面
   - 包含的 class：
     * .student-list - 学生列表容器
     * .student-card - 单个学生卡片
     * .student-id - 学号标记
     * .student-photo - 学生照片
     * .student-name - 学生姓名
     * .student-info - 学生信息区
     * .info-row - 信息行
     * .label - 标签
     * .value - 值
     * .btn-row - 按钮行

### 8. modal.css (模态框/删除确认)
   - 功能：删除确认对话框、模态框样式
   - 使用：include/delete_student.php, include/delete_news.php
   - 包含的 class：
     * .delete-container - 删除容器
     * .warning-icon - 警告图标
     * .warning-message - 警告消息
     * .student-info/news-info - 信息区
     * .action-buttons - 操作按钮
     * .btn-confirm, .btn-cancel - 确认/取消按钮

## 响应式设计

所有CSS文件都包含响应式设计，支持以下断点：
- 768px 以下：平板设备
- 480px 以下：手机设备

## 如何使用

在HTML文档的<head>中添加相应的CSS文件link标签：

<!-- 所有页面都需要 -->
<link rel="stylesheet" href="css/global.css">
<link rel="stylesheet" href="css/navbar.css">

<!-- 首页/主页 -->
<link rel="stylesheet" href="css/main-layout.css">

<!-- 后台管理 -->
<link rel="stylesheet" href="css/admin-layout.css">

<!-- 包含表单 -->
<link rel="stylesheet" href="css/form.css">

<!-- 包含表格 -->
<link rel="stylesheet" href="css/table.css">

<!-- 包含学生卡片 -->
<link rel="stylesheet" href="css/card.css">

<!-- 包含删除确认 -->
<link rel="stylesheet" href="css/modal.css">

## CSS 变量

在 global.css 中定义的CSS变量可在所有CSS文件中使用：

:root {
    --primary-color: #2e7d32;          /* 主色 - 绿色 */
    --primary-light: #388e3c;           /* 主色浅色 */
    --accent-color: #ff9800;            /* 强调色 - 橙色 */
    --accent-dark: #f57c00;             /* 强调色深色 */
    --secondary-color: #ffc107;         /* 辅助色 - 黄色 */
    --text-primary: #333;               /* 主文本色 */
    --text-secondary: #666;             /* 次文本色 */
    --text-light: #999;                 /* 浅文本色 */
    --bg-light: #f5f5f5;                /* 浅背景色 */
    --bg-lightest: #f9fbe7;             /* 最浅背景色 */
    --border-color: #e0e0e0;            /* 边框色 */
    --shadow-sm: 0 2px 4px rgba(0, 0, 0, 0.1);
    --shadow-md: 0 4px 12px rgba(0, 0, 0, 0.08);
    --shadow-lg: 0 8px 20px rgba(0, 0, 0, 0.15);
    --transition: all 0.3s ease;        /* 默认过渡 */
}

## 维护建议

1. 不要在include文件中添加<style>标签，改用外部CSS文件
2. 保持CSS文件的模块化结构
3. 使用CSS变量来保持颜色和样式的一致性
4. 在修改样式前，检查该样式是否被多个页面使用
5. 定期检查是否有重复的CSS规则

## 最新更新

- 整合了所有内部CSS为8个外部CSS文件
- 统一了颜色方案和设计系统
- 添加了完整的响应式设计支持
- 移除了所有include文件中的<style>标签
