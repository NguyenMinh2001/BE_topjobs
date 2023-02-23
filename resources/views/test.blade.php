<!DOCTYPE html>
<html>
  <head>
    <meta charset='UTF-8'>
    <script src='https://unpkg.com/react@16.3.1/umd/react.production.min.js'></script>
    <script src='https://unpkg.com/react-dom@16.3.1/umd/react-dom.production.min.js'></script>
    <script src='https://unpkg.com/react-router-dom@5.0.0/umd/react-router-dom.min.js'></script>
    <script src='https://unpkg.com/babel-standalone@6.26.0/babel.js'></script>
  </head>
  <body>
    <div id='root'></div>
    <script type='text/babel'>
      const Link = ReactRouterDOM.Link;
      const Route = ReactRouterDOM.Route;

      const App = () => (
            <div>aaa</div>
      )

      const Home = () => <h1>Home</h1>
      const Login = () => <h1>Login</h1>
      const Register = () => <h1>Register</h1>

      ReactDOM.render(<App />, document.querySelector('#root'));
    </script>
  </body>
</html>