<h3>Requirements</h3>
<ul>
<li>Php 7.3</li>
<li>node v15.2.1 (npm v7.0.8)</li>
</ul>
<h3>Technologies</h3>
<ul>
<li>laravel</li>
<li>vue</li>
<li>mysql</li>
</ul>
<h3>Command/App</h3>
<ul>
<li>docker</li>
<li>docker-compose</li>
<li>yarn</li>
<li>nvm ( this is to manage node and npm versions )</li>
</ul>
<h3>Setup</h3>
<ul>
<li>Download laradock [ ref. https://laradock.io/ ]</li>
<li>Update following environment variables inside laradock directory
<ul>
<li>APP_CODE_PATH_HOST=[your source code] e.g. ../hris</li>
<li>DATA_PATH_HOST=[dir where you want to save your data] e.g. ~/.hris/data</li>
<li>PHP_VERSION=7.3</li>
<li>COMPOSE_PROJECT_NAME=[your docker name/id] e.g. hris</li>
<li>LARADOCK_PHP_VERSION=7.3</li>
<li>NGINX_HOST_HTTP_PORT=[your host port] e.g. 7080</li>
<li>MYSQL_DATABASE=hris</li>
<li>MYSQL_USER=root</li>
<li>MYSQL_PASSWORD=lanex123</li>
<li>MYSQL_ROOT_PASSWORD=lanex123</li>
</ul>
</li>
<li>Add this on docker-compose.yml file located inside laradock directory
<div>
<code>env_file:<br>
&nbsp;&nbsp;&nbsp;- ${APP_CODE_PATH_HOST}.env
</code><br/>
             above <code>environment</code> tag inside <code>workspace</code> tag.
</li>
<li>Clone project</li>
<li>Update following environment variables inside project directory
<ul>
<li>DB_HOST=mysql</li>
<li>DB_PORT=3306</li>
<li>DB_DATABASE=hris</li>
<li>DB_USERNAME=hris</li>
<li>DB_PASSWORD=lanex123</li>
</ul></li>
<li>Run <code>composer install</code></li>
<li>Run <code>yarn install</code></li>
<li>Run <code>docker-compose up -d nginx mysql workspace inside</code> laradock folder</li>
</ul>
<h3>NOTE</h3>
Let us use same DB config so that there will be no conflict in the future.
<h3>Folder Archetecture</h3>
<code>
<div>laradock</div>
<div>-- .env</div>
<div>-- docker-compose.yml</div>
<div>...</div>
<div>-- workspace</div>
<div>hris [this is base on what you put on APP_CODE_PATH_HOST]</div>
<div>-- .env</div>
<div>-- app</div>
<div>-- public</div>
<div>-- routes</div>
<div>...</div>
<div>-- vendor</div>
</code>
