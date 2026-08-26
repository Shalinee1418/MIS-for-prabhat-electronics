Add-Type -AssemblyName System.Drawing
Add-Type -AssemblyName System.Drawing.Common -ErrorAction SilentlyContinue

$width = 2600
$height = 1900
$bmp = New-Object System.Drawing.Bitmap($width, $height)
$g = [System.Drawing.Graphics]::FromImage($bmp)
$g.SmoothingMode = [System.Drawing.Drawing2D.SmoothingMode]::AntiAlias
$g.TextRenderingHint = [System.Drawing.Text.TextRenderingHint]::AntiAliasGridFit
$black = [System.Drawing.Brushes]::Black
$white = [System.Drawing.Brushes]::White
$gray = [System.Drawing.Brushes]::DimGray
$pen = New-Object System.Drawing.Pen([System.Drawing.Color]::Black, 3)
$thin = New-Object System.Drawing.Pen([System.Drawing.Color]::Black, 2)
$dash = New-Object System.Drawing.Pen([System.Drawing.Color]::DimGray, 2)
$dash.DashStyle = [System.Drawing.Drawing2D.DashStyle]::Dash
$fontTitle = New-Object System.Drawing.Font('Arial', 26, [System.Drawing.FontStyle]::Bold)
$fontSubtitle = New-Object System.Drawing.Font('Arial', 15, [System.Drawing.FontStyle]::Regular)
$fontHeader = New-Object System.Drawing.Font('Arial', 15, [System.Drawing.FontStyle]::Bold)
$fontField = New-Object System.Drawing.Font('Consolas', 12, [System.Drawing.FontStyle]::Regular)
$fontSmall = New-Object System.Drawing.Font('Arial', 12, [System.Drawing.FontStyle]::Regular)

$g.Clear([System.Drawing.Color]::White)
$g.DrawString('MIS for Prabhat Electronics — Entity Relationship Diagram', $fontTitle, $black, 55, 25)
$g.DrawString('Database schema from database/ddl.sql  |  solid = declared FK  |  dashed = logical/application relationship', $fontSubtitle, $gray, 58, 62)

$tables = @{
  user = @('PK user_id VARCHAR(50)', 'password VARCHAR(100)')
  supplier = @('PK supplier_id INT AUTO_INCREMENT', 'supplier_name VARCHAR(100) NOT NULL', 'phone CHAR(10) UNIQUE NOT NULL', 'email VARCHAR(255)', 'address CHAR(255)')
  category = @('PK category_id INT AUTO_INCREMENT', 'category_name VARCHAR(255) NOT NULL', 'hsn_code INT NOT NULL', 'descrption VARCHAR(255) NOT NULL')
  product = @('PK product_id INT AUTO_INCREMENT', 'UK category_id INT NOT NULL', 'name VARCHAR(255) NOT NULL', 'purchase_price DECIMAL', 'product_code VARCHAR(255) NOT NULL', 'brand VARCHAR(255) NOT NULL')
  purchase = @('PK purchase_id INT AUTO_INCREMENT', 'UK supplier_id INT NOT NULL', 'purchase_date DATE NOT NULL', 'tax_amount DECIMAL', 'total_amount DECIMAL', 'date DATE NOT NULL', 'payment_status ENUM', 'unit_price DECIMAL')
  purchase_items = @('PK purchase_item_id INT AUTO_INCREMENT', 'FK purchase_id INT NOT NULL', 'product_id INT NOT NULL', 'quantity INT NOT NULL', 'price DECIMAL(10,2)', 'subtotal DECIMAL(10,2)')
  sale = @('PK sale_id INT AUTO_INCREMENT', 'sale_date DATE NOT NULL', 'discount DECIMAL', 'invoice_number INT NOT NULL', 'tax_amount DECIMAL', 'unit_price DECIMAL', 'total_amount DECIMAL')
  sale_items = @('PK sale_item_id INT AUTO_INCREMENT', 'FK sale_id INT NOT NULL', 'FK product_id INT NOT NULL', 'quantity INT', 'unit_price DECIMAL(12,2)', 'discount DECIMAL(12,2)', 'tax_amount DECIMAL(12,2)')
  customers = @('PK customer_id INT AUTO_INCREMENT', 'customer_name VARCHAR(100)', 'phone VARCHAR(15)', 'email VARCHAR(120)', 'gst_number VARCHAR(30)', 'city VARCHAR(50)', 'pincode VARCHAR(10)', 'address TEXT')
  service_requests = @('PK service_request_id INT AUTO_INCREMENT', 'FK customer_id INT NOT NULL', 'FK product_id INT NOT NULL', 'request_date DATE NOT NULL', 'delivery_date DATE', 'problem_description TEXT', 'service_status ENUM', 'service_charge DECIMAL(10,2)')
  service_parts_used = @('PK service_part_used_id INT AUTO_INCREMENT', 'FK service_request_id INT NOT NULL', 'FK product_id INT NOT NULL', 'quantity INT NOT NULL', 'unit_price DECIMAL(10,2)')
  invoices = @('PK id INT AUTO_INCREMENT', 'invoice_no VARCHAR(50)', 'total DECIMAL(10,2)', 'gst_total DECIMAL(10,2)', 'grand_total DECIMAL(10,2)', 'created_at TIMESTAMP')
  invoice_items = @('PK id INT AUTO_INCREMENT', 'invoice_id INT', 'product_id INT', 'quantity INT', 'price DECIMAL(10,2)', 'gst_rate DECIMAL(5,2)', 'gst_amount DECIMAL(10,2)', 'total DECIMAL(10,2)')
  payment_status = @('PK payment_id INT AUTO_INCREMENT', 'sale_id INT NOT NULL', 'service_request_id INT NOT NULL', 'customer_id INT NOT NULL', 'payment_date DATE NOT NULL', 'tax_amount DECIMAL', 'total_amount DECIMAL', 'payment_mode ENUM', 'payment_status ENUM')
  Transaction = @('PK transaction_id INT AUTO_INCREMENT', 'transaction_type VARCHAR(255)', 'transaction_date DATE NOT NULL', 'debit_amount DECIMAL', 'credit_amount DECIMAL', 'narration VARCHAR(255)')
  account_ledger = @('PK ledger_id INT AUTO_INCREMENT', 'account_name CHAR(50) NOT NULL', 'account_type ENUM', 'opening_balance DECIMAL', 'closing_balance DECIMAL')
  sales_items = @('PK sales_items_id INT AUTO_INCREMENT', 'stock_item_id INT NOT NULL', 'sale_id INT NOT NULL', 'category_id INT NOT NULL', 'serial_number INT NOT NULL', 'quantity INT NOT NULL', 'discount DECIMAL', 'unit_price DECIMAL', 'tax_amount DECIMAL')
  service_part_used = @('PK service_part_used_id INT AUTO_INCREMENT', 'service_request_id INT NOT NULL', 'stock_item_id INT NOT NULL', 'unit_price DECIMAL', 'quantity INT NOT NULL', 'charge_to_customer DECIMAL')
}

$pos = @{
 user=@(60,110); supplier=@(700,110); category=@(1340,110); product=@(1980,110)
 purchase=@(60,465); purchase_items=@(700,465); sale=@(1340,465); sale_items=@(1980,465)
 customers=@(60,820); service_requests=@(700,820); service_parts_used=@(1340,820); invoices=@(1980,820)
 invoice_items=@(60,1175); payment_status=@(700,1175); Transaction=@(1340,1175); account_ledger=@(1980,1175)
 sales_items=@(60,1530); service_part_used=@(700,1530)
}
$boxW = 560
$headerH = 38
$rowH = 25
$rects = @{}

foreach ($name in $tables.Keys) {
  $x = $pos[$name][0]; $y = $pos[$name][1]; $h = $headerH + ($tables[$name].Count * $rowH) + 8
  $rects[$name] = New-Object System.Drawing.Rectangle($x,$y,$boxW,$h)
}

function Center([int]$v) { return [int]($v) }
function Connect($a, $b, $label, $isDashed=$false) {
  $ra = $rects[$a]; $rb = $rects[$b]
  $ax = $ra.X + $ra.Width/2; $ay = $ra.Y + $ra.Height/2
  $bx = $rb.X + $rb.Width/2; $by = $rb.Y + $rb.Height/2
  if ([Math]::Abs($bx-$ax) -gt [Math]::Abs($by-$ay)) {
    if ($bx -gt $ax) { $x1=$ra.Right; $x2=$rb.Left } else { $x1=$ra.Left; $x2=$rb.Right }
    $y1=$ay; $y2=$by
  } else {
    if ($by -gt $ay) { $y1=$ra.Bottom; $y2=$rb.Top } else { $y1=$ra.Top; $y2=$rb.Bottom }
    $x1=$ax; $x2=$bx
  }
  $p = if ($isDashed) { $dash } else { $thin }
  $g.DrawLine($p, $x1, $y1, $x2, $y2)
  $mx = ($x1+$x2)/2; $my = ($y1+$y2)/2
  $g.DrawString($label, $fontSmall, $gray, $mx-24, $my-15)
}

# Draw relationships first, keeping table text on top.
Connect supplier purchase '1:N'
Connect purchase purchase_items '1:N'
Connect category product '1:N'
Connect sale sale_items '1:N'
Connect product sale_items '1:N'
Connect customers service_requests '1:N'
Connect product service_requests '1:N'
Connect service_requests service_parts_used '1:N'
Connect product service_parts_used '1:N'
Connect invoices invoice_items '1:N'
Connect product invoice_items '1:N' $true
Connect sale payment_status '1:N' $true
Connect service_requests payment_status '1:N' $true
Connect customers payment_status '1:N' $true
Connect product purchase_items '1:N' $true
Connect sale sales_items '1:N' $true
Connect customers service_part_used '1:N' $true

foreach ($name in $tables.Keys) {
  $r = $rects[$name]
  $g.FillRectangle($white, $r)
  $g.DrawRectangle($pen, $r)
  $g.FillRectangle($black, $r.X, $r.Y, $r.Width, $headerH)
  $g.DrawString($name, $fontHeader, $white, $r.X+10, $r.Y+8)
  $i=0
  foreach ($field in $tables[$name]) {
    $fy = $r.Y + $headerH + 5 + ($i*$rowH)
    $brush = if ($field.StartsWith('PK')) { $black } elseif ($field.StartsWith('FK') -or $field.StartsWith('UK')) { $gray } else { $black }
    $g.DrawString($field, $fontField, $brush, $r.X+10, $fy)
    $i++
  }
}

$legendY = 1840
$g.DrawLine($thin, 60, $legendY, 170, $legendY)
$g.DrawString('Declared foreign key', $fontSmall, $black, 180, $legendY-9)
$g.DrawLine($dash, 480, $legendY, 590, $legendY)
$g.DrawString('Logical / inferred link', $fontSmall, $gray, 600, $legendY-9)
$g.DrawString('Note: stock_item_id references appear in legacy tables, but no stock_item table is declared in ddl.sql. sales_items and service_part_used are retained as legacy variants.', $fontSmall, $gray, 60, 1870)

$out = Join-Path (Get-Location) 'er_diagram.png'
$bmp.Save($out, [System.Drawing.Imaging.ImageFormat]::Png)
$g.Dispose(); $bmp.Dispose()
Write-Output $out
