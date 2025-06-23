<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Guidelines</title>
  <link rel="stylesheet" href="{{ asset('css/admin.css') }}"> 
</head>

<body>
  <div class="container">
    <div class="sidebar">
      <h2>DIGITALES admin</h2>
      <ul>
        <li><a href="{{ route('admin.analytics') }}">📊 Analytics</a></li>
        <li><a href="{{ route('admin.publishs') }}">🚀 Publish Books</a></li>
        <li><a href="{{ route('admin.booksPublished') }}">✅ Books Published</a></li>
        <li><a href="{{ route('admin.userRecord') }}">📝 Users Records</a></li>
        <li><a href="{{ route('admin.statistic') }}">📈 Book Statistics</a></li>
        <li style="background-color: #cbd5f1;"><a style="color: blue;" href="{{ route('admin.guideline') }}">💡 Guidelines</a></li>
        <li><a href="{{ route('admin.authors') }}">🧑 Author</a></li>
        <li><a href="{{ route('admin.digitalsNews') }}">📰 Digital News</a></li>
      </ul>
    </div>

    <div class="content">
      <h2>📖 Guidelines</h2>

      <h3>Terms & Conditions</h3>
      <ol>
        <li>You must be at least 13 years old to use this service. If you are under 18, you must have permission from a parent or guardian.</li>
        <li>To access certain features, you may need to register an account. You must provide accurate and complete information. You are responsible for maintaining the security of your account and for any activity under your account.</li>
        <li>The content on the website is for personal, non-commercial use only. You may not copy, share, download, or distribute any materials unless explicitly allowed. All content is the intellectual property of [Your Online Library Name] or its licensors.</li>
        <li>You agree not to use the service for unlawful purposes or in a way that could harm the platform or other users. Prohibited actions include unauthorized access, distribution of malicious software, and harassment.</li>
        <li>Some features may require payment or a subscription. Fees are non-refundable unless otherwise stated. We may change prices or features at any time with prior notice.</li>
      </ol>

      <div class="actions">
        <button class="btn">Edit</button>
        <button class="btn">Add</button>
      </div>

      <h3>FAQ Management</h3>
      <ol>
        <li><strong>What is [Your Online Library Name]?</strong><br>
          [Your Online Library Name] is a digital platform where users can access a wide range of books, articles, and other reading materials online.
        </li>
        <li><strong>How do I create an account?</strong><br>
          Click on the "Sign Up" or "Register" button on the homepage and fill in the required information. You’ll need a valid email address to complete registration.
        </li>
        <li><strong>Is it free to use?</strong><br>
          Some content is available for free. However, premium materials may require a paid subscription or a one-time fee.
        </li>
        <li><strong>What types of materials are available?</strong><br>
          We offer e-books, academic journals, magazines, audiobooks, and other educational resources.
        </li>
        <li><strong>Can I download books?</strong><br>
          This depends on the material. Some books are available for offline reading, while others can only be accessed online.
        </li>
      </ol>

      <div class="actions">
        <button class="btn">Edit</button>
        <button class="btn">Add</button>
      </div>
    </div>
  </div>
</body>
</html>
