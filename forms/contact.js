export default {
    async fetch(request) {
      if (request.method === "POST") {
        const botToken = "7638645172:AAEFiwwvAnRE-LWrPCfuuP9cbl2LPW8FRak"; 
        const chatId = "1116211356";
        const url = `https://api.telegram.org/bot${botToken}/sendMessage`;
  
        const formData = await request.formData();
        const name = formData.get("name");
        const email = formData.get("email");
        const subject = formData.get("subject");
        const message = formData.get("message");
  
        const text = `New Contact Form Submission:\nName: ${name}\nEmail: ${email}\nSubject: ${subject}\nMessage: ${message}`;
  
        const response = await fetch(url, {
          method: "POST",
          headers: { "Content-Type": "application/json" },
          body: JSON.stringify({ chat_id: chatId, text: text }),
        });
  
        if (response.ok) {
          return new Response(JSON.stringify({ success: true }), { status: 200 });
        } else {
          return new Response(JSON.stringify({ success: false, message: "Failed to send message" }), { status: 500 });
        }
      }
  
      return new Response("Invalid request", { status: 405 });
    },
  };
  