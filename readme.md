# RDS2 Project

This project is designed to manage course data for North South University (NSU) and save the data into both a JSON file and a MySQL database. The following steps guide you through the process of updating the course data, saving it, and automating the data handling with PHP and JavaScript.

## Steps to Run and Save Data

### 1. **Adjust the DataTable Page Length in Browser Console**
   - Open your browser’s Developer Tools (`F12` or `Cmd + Option + I` on Mac).
   - Go to the **Console** tab.
   - Run the following JavaScript code to adjust the DataTable page length to 5000:
     ```javascript
     $('#offeredCourseTbl').DataTable().destroy();
     $('#offeredCourseTbl').DataTable({
         "pageLength": 5000
     });
     ```

### 2. **Download the Updated HTML File**
   - After running the JavaScript code, **download the HTML file** containing the updated course data.
   - Open the downloaded HTML file, locate the `<tbody>` section, and **copy the entire `<tbody>`** content.

### 3. **Update the `rds2_html_000.html` File**
   - Duplicate the `rds2_html_000.html` file and rename it for the new semester (e.g., `rds2_html_000.html`).
   - Open the new HTML file and **replace the `<tbody>` section** with the one you copied from the downloaded file.

### 4. **Run the PHP Project on Local Server**
   - Open your terminal and navigate to the root directory of your PHP project.
   - Run the following command to start the PHP built-in server:
     ```bash
     php -S localhost:1111
     ```
   - This will serve your PHP project on `http://localhost:1111`.

### 5. **Access the Updated HTML Page**
   - Open your browser and go to the following location (or just press `cmd + 'press the link below in readme file'`):
     ```bash
     http://localhost:1111/html/rds2_html_000.html
     ```
   - You should now see the updated HTML page for the new semester's courses.

### 6. **Save Data Using the "Save Data" Button**
   - On the updated page, click the **Save Data** button.
   - This will trigger the following actions:
     - The course data is saved into a **JSON file**.
     - The PHP script will insert the data into the **MySQL database**.
     - Both the **JSON file** and **database** will be updated with the new semester's course information.

### 7. **Automation**
   - The process of saving data into the **JSON file** and inserting it into the **database** is automated once the **Save Data** button is clicked.
   - The new data will be ready for use across the system.
