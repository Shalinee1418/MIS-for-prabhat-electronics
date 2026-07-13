<?php
// 1. PHP LOGIC FIRST — nothing renders here
$current = strtok($_SERVER['REQUEST_URI'], '?');

function navLink(string $href, string $label, string $current): string
{
    $active = ($current === $href) ? ' active' : '';
    return "<a href=\"$href\" class=\"nav-link$active\">$label</a>";
}
?>

<!-- 2. CSS SECOND — before any HTML that uses these classes -->
<link rel="stylesheet" href="/assets/css/style.css">
<style>
    .sidebar {
        width: 260px;
        background: #0a1628;
        display: flex;
        flex-direction: column;
        padding: 2.5rem 1.75rem;
        flex-shrink: 0;
        min-height: 100vh;
    }

    .brand-name {
        font-size: 24px;
        font-weight: 700;
        color: #fff;
        letter-spacing: 3px;
        border-bottom: 2px solid #2563eb;
        padding-bottom: 6px;
        display: inline-block;
    }

    .brand-sub {
        font-size: 10px;
        letter-spacing: 5px;
        color: #94a3b8;
        margin-top: 6px;
        display: block;
    }

    .brand-tag {
        font-size: 9px;
        letter-spacing: 2px;
        color: #475569;
        margin-top: 10px;
        display: block;
    }

    .circuit-line {
        display: flex;
        align-items: center;
        gap: 4px;
        margin-top: 14px;
    }

    .circuit-line span {
        height: 1px;
        flex: 1;
        background: #1e3a5f;
    }

    .circuit-dot {
        width: 6px;
        height: 6px;
        border-radius: 50%;
        background: #2563eb;
    }

    nav {
        display: flex;
        flex-direction: column;
        padding: 20px 0;
        flex: 1;
    }

    .nav-link {
        color: #94a3b8;
        text-decoration: none;
        padding: 12px 16px;
        margin-bottom: 4px;
        border-radius: 6px;
        font-size: 14px;
        transition: background 0.2s, color 0.2s;
    }

    .nav-link:hover {
        background: rgba(255, 255, 255, 0.08);
        color: #ffffff;
    }

    .nav-link.active {
        background: #2563eb;
        color: #ffffff;
        font-weight: 600;
    }

    .logout-link {
        color: #475569;
        text-decoration: none;
        padding: 12px 16px;
        border-radius: 6px;
        font-size: 14px;
        margin-top: auto;
        transition: color 0.2s;
    }

    .logout-link:hover {
        color: #f87171;
    }
</style>

<!-- 3. HTML THIRD — all structure here, uses the classes defined above -->
<aside class="sidebar">

    <!-- Brand block -->
    <div class="brand">
        <!-- <img src="/assets/images/prabhat_electronics.png"
             alt="Prabhat Electronics"
             style="width:100%;max-width:140px;display:block;margin:0 auto 20px;"> -->
        <span class="brand-name">PRABHAT</span>
        <span class="brand-sub">E L E C T R O N I C S</span>
        <span class="brand-tag">POWER · PRECISION · PERFORMANCE</span>
        <div class="circuit-line">
            <span></span>
            <div class="circuit-dot"></div>
            <span></span>
            <div class="circuit-dot"></div>
            <span></span>
            <div class="circuit-dot"></div>
        </div>
    </div>

    <!-- Navigation -->
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

        <a href="/auth/logout" class="logout-link">Logout</a>
    </nav>

</aside> <!-- ✅ properly closed -->