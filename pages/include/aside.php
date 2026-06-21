<link rel="stylesheet" href="/assets/css/style.css">

<!-- <img src="/assets/images/prabhat_electronics.png" alt="" class="logo"> -->
    <?php $current = $_SERVER['REQUEST_URI']; ?>

<nav>
    <a href="/user/admin-dashboard" class="<?= $current === '/user/admin-dashboard' ? 'active' : '' ?>">Dashboard</a>
    <a href="/stock-item"           class="<?= $current === '/stock-item' ? 'active' : '' ?>">Stock Item</a>
    <a href="/purchase"             class="<?= $current === '/purchase' ? 'active' : '' ?>">Purchase</a>
    <a href="/service"              class="<?= $current === '/service' ? 'active' : '' ?>">Service Requests</a>
    <a href="/sale"                 class="<?= $current === '/sale' ? 'active' : '' ?>">Sales</a>
    <a href="/supplier"             class="<?= $current === '/supplier' ? 'active' : '' ?>">Suppliers</a>
    <a href="/customer"             class="<?= $current === '/customer' ? 'active' : '' ?>">Customers</a>
    <a href="/reports"              class="<?= $current === '/reports' ? 'active' : '' ?>">Reports</a>
    <a href="/settings"             class="<?= $current === '/settings' ? 'active' : '' ?>">Settings</a>
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