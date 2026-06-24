<?php
$current = strtok($_SERVER['REQUEST_URI'], '?');
function navLink(string $href, string $label, string $current): string {
    $active = ($current === $href) ? ' active' : '';
    return "<a href=\"$href\" class=\"$active\">$label</a>";
}
?>
<link rel="stylesheet" href="/assets/css/style.css">
<img src="/assets/images/prabhat_electronics.png" alt="Prabhat Electronics" class="logo"
     style="width:100%;max-width:160px;display:block;margin:0 auto 24px;">
<nav>
    <?= navLink('/user/admin-dashboard', 'Dashboard',        $current) ?>
    <?= navLink('/stock-item',           'Stock Item',       $current) ?>
    <?= navLink('/purchase',             'Purchase',         $current) ?>
    <?= navLink('/service',              'Service Requests', $current) ?>
    <?= navLink('/sale',                 'Sales',            $current) ?>
    <?= navLink('/supplier',             'Suppliers',        $current) ?>
    <?= navLink('/customer',             'Customers',        $current) ?>
    <?= navLink('/reports',              'Reports',          $current) ?>
    <?= navLink('/settings',             'Settings',         $current) ?>
    <a href="/auth/logout" style="margin-top:auto;opacity:0.7">Logout</a>
</nav>


<style>
   
     nav {
    display: flex;
    flex-direction: column;
    padding: 20px 0;
}

nav a {
    color: white;
    text-decoration: none;
    padding: 12px 20px;    
    margin-bottom: 20px;  
    border-radius: 6px;
    font-size: 15px;
    transition: background 0.2s;
   
}

nav a:hover {
    background: rgba(255, 255, 255, 0.15);
}

nav a.active {
    background: rgba(255, 255, 255, 0.2);
    font-weight: 600;
}
</style>